<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\Confirmation;
use App\Mail\ForgetPassword;
use App\Mail\Verify;
use App\Models\AboutUs;
use App\Models\Addons;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Packages;
use App\Models\Pet;
use App\Models\Service;
use App\Models\Slider;
use Gate;
use Carbon\Carbon;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    

    // public function test_mail(){  
    //     $tomorrow = date("Y-m-d", strtotime("+1 day"));
    //     $appointments=Appointment::where('date',$tomorrow)->get();
    //     foreach ($appointments as $appointment){
    //         if(!$appointment->reminded){
    //             $objDemo=new \stdClass();
    //             $objDemo->title ='Reminder email';
    //             $objDemo->date = $appointment->date;
    //             $objDemo->time = $appointment->time;
    //             Mail::to($appointment->client->email)->send(new \App\Mail\Reminders($objDemo));
    //             $appointment->reminded = 1;
    //             $appointment->save();
    //         } 
    //     }  
    //     return 'test_mail';
    // }
    
    public function index()
    {
        //$services = Service::all();
        $aboutus = AboutUs::first();
        $category = Category::all();
        $gallery = Gallery::all();
        $sliders = Slider::all();
        $addons_right = Addons::where('active',1)->orderBy('updated_at','desc')->get()->take(3);
        $addons_left = Addons::where('active',1)->orderBy('updated_at','asc')->get()->take(3); 
        $comments =Comments::where('flag','1')->orderBy('id','DESC')->take('4')->get();
        return view('frontend.index', compact('aboutus', 'category', 'gallery','comments','sliders','addons_right','addons_left'));
    }

    public function service()
    {
        $services = Service::all();
        return view('frontend.service', compact('services'));
    }

    public function aboutus()
    {
        $aboutus = AboutUs::first();
        return view('frontend.aboutus', compact('aboutus'));
    }
    public function reminder(){
        
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        $appointments=Appointment::where('date',$tomorrow)->get();
        foreach ($appointments as $appointment){
            if(!$appointment->reminded){
                $objDemo=new \stdClass();
                $objDemo->title ='Reminder email';
                $objDemo->date = $appointment->date;
                $objDemo->time = $appointment->time;
                Mail::to($appointment->client->email)->send(new \App\Mail\Reminders($objDemo));
                $appointment->reminded = 1;
                $appointment->save();
            } 
        }    
    }

    public function contact(Request $request)
    {

        $aboutus = AboutUs::first();
        if ($request->post())
        {
            Contact::create($request->all());
            $objDemo = new \stdClass();
            $objDemo->title ='New message from Contact-Us ';
            $objDemo->name = $request->name;
            $objDemo->email = $request->email;
            $objDemo->subject = $request->subject;
            $objDemo->message = $request->message;
            Mail::to('info@petsconciergeksa.com')->send(new \App\Mail\Contact($objDemo));
            return view('frontend.contact',compact('aboutus'));
        }else{
            return view('frontend.contact',compact('aboutus'));
        }
    }

    public function login(Request $request)
    {
        if ($request->post()){
            $client =Clients::where('email',$request->email)->first();

            if ($client == null){
                return redirect()->back()->with('error','email not exist');
            }elseif ($client->status == 0){
                return redirect()->back()->with('error','your account not active yet');
            } else if(!Hash::check($request->password, $client->password))
            {
                return redirect()->back()->with('error',"incorrect password");
            }
            Auth::guard('client')->login($client);
            return redirect('/client/profile');
        }
        $aboutus = AboutUs::first();
        return view('frontend.login',compact('aboutus'));
    }

    public function verify(Request $request,$id)
    {
        $user = Clients::find($id);
        $aboutus = AboutUs::first();
        if ($request->post() && $user->status ==0){
            if ($request->code == $user->code){
                $user->status = 1;
                $user->save();
                return redirect('client/login')->with('success','register successfully');
            }else{
                if ($user->status == 0)
                    return redirect()->back()->with('error','Code not matching please try again.');
                else
                    return redirect('client/login');
            }
        }else{
            if ($user)
                return view('frontend.verify',compact('id','aboutus'));
            else
                return redirect('client/register');

        }
    }

    public function resend($id)
    {
        $client = Clients::find($id);
        $code = mt_rand(10000, 99999); // better than rand()
        $objDemo = new \stdClass();
        $objDemo->title ='Welcome '.$client->name;
        $objDemo->message='Use this code to verify yuur account:'.$code;
        Mail::to($client->email)->queue(new Verify($objDemo));
        return redirect('verify/'.$client->id)->with('success','Kindly verify your account');
    }
    public function register(Request $request)
    {
        if ($request->post()){
            $data = $request->all();
            if ($request->password == $request->c_password){
                $emailCheck = Clients::where('email','==',$request->email)->orWhere('phone',$request->phone)->first();
                if (!$emailCheck) {
                    $code = mt_rand(10000, 99999); // better than rand()
                    $data['code'] = $code;
                    $data['password'] = Hash::make($request->password);
                    $client = Clients::create($data);
                    $objDemo = new \stdClass();
                    $objDemo->title ='Welcome '.$data['name'];
                    $objDemo->message='Use this code to verify yuur account:'.$code;
                    Mail::to($request->email)->queue(new Verify($objDemo));
                    return redirect('verify/'.$client->id)->with('success','Kindly verify your account');
                }else{
                    return redirect()->back()->withInput($request->input())->with('error','email or phone already used');
                }
            }else{
                return redirect()->back()->withInput($request->input())->with('error','password not matching');
            }
        }
        $cities = Cities::all();
        $aboutus = AboutUs::first();
        return view('frontend.register',compact('cities','aboutus'));
    }

    public function gallery()
    {
        $category = Category::all();
        $gallery = Gallery::all();
        return view('frontend.gallery', compact('category', 'gallery'));
    }


    //User Controllers --------------------------------------------------------------------
    public function addpet()
    {
        $categories = Category::all();
        return view('frontend.users.addpet', compact('categories'));
    }

    public function visits()
    {
        $appointments = Appointment::with('comment')->where('user_id', Auth::guard('client')->user()->id)->where('is_it_loyalty_appoint',0)->orderBy('id','desc')->paginate(10); 
        return view('frontend.users.allvisits', compact('appointments'));
    }

    public function loyalty_cards()
    { 
        $pets = Pet::where('client_id', Auth::guard('client')->user()->id)->get();
        $have_loyalty_card = 0;
        $aboutus = AboutUs::first();
        $appointment_count = Appointment::where('status',2)->where('user_id',Auth::guard('client')->user()->id)->where('is_counted_as_loyalty',0)->where('is_it_loyalty_appoint',0)->count();
        if($appointment_count >= $aboutus->count_to_loyalty){
            $have_loyalty_card = 1;
        }
        $appointments = Appointment::with('comment')->where('user_id', Auth::guard('client')->user()->id)->where('is_it_loyalty_appoint',1)->orderBy('id','desc')->paginate(10); 
        return view('frontend.users.loyalty_cards', compact('appointments','have_loyalty_card','pets','aboutus'));
    }

    public function appointment($id,Request $request)
    {
        if (isset(Auth::guard('client')->user()->id)) {
            $pets = Pet::where('client_id', Auth::guard('client')->user()->id)->get();
            $addons = Addons::all();

            return view('frontend.users.appointment', compact('pets','id', 'addons'));
        }
        else {
            $aboutus = AboutUs::first();
            return view('frontend.login',compact('aboutus'));
        }
    }

    public function mypets()
    {
        $pets = Pet::where('client_id',Auth::guard('client')->user()->id)->get();
        $categories = Category::all();

        return view('frontend.users.mypets', compact('pets', 'categories'));
    }

    public function editUser()
    {
        $user = Clients::find(Auth::guard('client')->user()->id);
        $cities = Cities::all();

        return view('frontend.users.edit', compact('user', 'cities'));
    }

    public function logout(Request $request) {
        Auth::logout();
        Auth::guard('client')->logout();
        return redirect('/client/login');
    }

    public function addpets(Request $request)
    {
        $data = $request->all();

        if ($request->image) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image')->hashName());
            $request->file('image')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image'] = $date . '.' . $ext[1];
        }
        $data['client_id'] = Auth::guard('client')->user()->id;

       Pet::create($data);
        return redirect('/client/my/pets')->with('success','added successfully');
    }

    public function petDetails($id)
    {
        $pet = Pet::find($id);
        $appointments = Appointment::where('pet_id', $id)->get();

        return view('frontend.users.petDetails', compact('pet', 'appointments'));
    }

    public function updateuser(Request $request)
    {
        $clients = Clients::find(Auth::guard('client')->user()->id);
        $clients->name = $request->name;
        $clients->email = $request->email;
        $clients->phone = $request->phone;
        if ($request->password)
            $clients->password = Hash::make($request->password);
//        $clients->city_id = $request->city_id;
        $clients->address = $request->address;
        $clients->lat = $request->lat;
        $clients->lng = $request->lng;
        $clients->save();

        return redirect()->back()->with('success','Updated successfully');
    }

    public function makeAppointment(Request $request)
    {
        // calculate total price
        $package = Packages::find($request->package_id);
        if ($request->size == 0)
            $package_price = $package->small_price;
        elseif ($request->size == 1)
            $package_price = $package->mid_price;
        else
            $package_price = $package->hi_price;

        $total_addons = 0 ;
        if($request->has('addon_id') && $request->addon_id != null){
            foreach($request->addon_id as $raw){
                $addon = Addons::find($raw);
                if($addon){
                    $total_addons += $addon->price;
                    $addons[] = [
                        'name' => $addon->name,
                        'price' => $addon->price
                    ];
                }
            }
        }else{
            $addons = null;
        }
        // --------------

        $client = Clients::find(Auth::guard('client')->user()->id);

        if (!$client->address && !$client->lat && !$client->lng)
            return redirect()->back()->with('error','You must add your address from your profile');

        $appointment = new Appointment();
        $appointment->user_id = Auth::guard('client')->user()->id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->additional_info = $request->additional_info;
        $appointment->pet_id = $request->pet_id;
        $appointment->package_id = $request->package_id;
        if ($request->addon_id)
            $appointment->addon_id = json_encode($request->addon_id); 
        if ($request->size == 0)
            $appointment->size = 'Small';
        elseif ($request->size == 1)
            $appointment->size = 'Medium';
        else
            $appointment->size = 'Large';
        $appointment->price = $package_price + $total_addons;
        $appointment->save();

        $objDemo=new \stdClass();
        $objDemo->title ='New Appointment';
        $objDemo->customer_name= $client->name;
        $objDemo->customer_email= $client->email;
        $objDemo->customer_phone= $client->phone;
        $objDemo->customer_address= $client->address; 
        $objDemo->appointment_date= $request->date; 
        $objDemo->appointment_time= $request->time; 
        $pet=Pet::find($request->pet_id);
        $objDemo->pet_name = $pet->name;
        $objDemo->pet_kind = $pet->category->name ?? '';
        $objDemo->pet_gender = $pet->gender;
        $objDemo->pet_size = $appointment->size;
        $objDemo->pet_age = $pet->age;
        $objDemo->package_name = $package->name;
        $objDemo->package_price = $package_price;
        $objDemo->addons = $addons;
        
        
        
        Mail::to('info@petsconciergeksa.com')->send(new \App\Mail\Appointment($objDemo));
        return redirect()->back()->with('success','Created successfully');

    }
    public function bookloyalty(Request $request)
    {
        $aboutus = AboutUs::first();

        $appointments = Appointment::where('status',2)->where('user_id',Auth::guard('client')->user()->id)->where('is_counted_as_loyalty',0)->where('is_it_loyalty_appoint',0)->get();
        if($appointments->count() < $aboutus->count_to_loyalty){ 
            return redirect()->back()->with('error','You must reach to ' . $aboutus->count_to_loyalty . ' Appointment done');
        }else{
            
            $package = Packages::find($request->package_id); 
            $client = Clients::find(Auth::guard('client')->user()->id);

            if (!$client->address && !$client->lat && !$client->lng)
                return redirect()->back()->with('error','You must add your address from your profile');

            $appointment = new Appointment();
            $appointment->user_id = Auth::guard('client')->user()->id;
            $appointment->date = $request->date;
            $appointment->time = $request->time;
            $appointment->pet_id = $request->pet_id;
            $appointment->package_id = $request->package_id;
            $appointment->is_counted_as_loyalty = 1;
            $appointment->is_it_loyalty_appoint = 1;
            if ($request->size == 0)
                $appointment->size = 'Small';
            elseif ($request->size == 1)
                $appointment->size = 'Medium';
            else
                $appointment->size = 'Large';
            $appointment->price = 0;
            $appointment->save();

            $objDemo=new \stdClass();
            $objDemo->title ='New Appointment';
            $objDemo->customer_name= $client->name;
            $objDemo->customer_email= $client->email;
            $objDemo->customer_phone= $client->phone;
            $objDemo->customer_address= $client->address; 
            $objDemo->appointment_date= $request->date; 
            $objDemo->appointment_time= $request->time; 
            $pet=Pet::find($request->pet_id);
            $objDemo->pet_name = $pet->name;
            $objDemo->pet_kind = $pet->category->name ?? '';
            $objDemo->pet_gender = $pet->gender;
            $objDemo->pet_size = $appointment->size;
            $objDemo->pet_age = $pet->age;
            $objDemo->package_name = $package->name;
            $objDemo->package_price = 0;
            $objDemo->addons = null;
            
            // change the appointments as they counted in loyalty card
            foreach($appointments->take($aboutus->count_to_loyalty) as $appo){
                $appo->is_counted_as_loyalty = 1;
                $appo->save();
            }
            
            Mail::to('info@petsconciergeksa.com')->send(new \App\Mail\Appointment($objDemo));
            return redirect()->back()->with('success','Created successfully');

        }
    }

    public function getTime($date)
    {
        $allTimes = ['10:00','11:30','1:00','4:00','5:30','7:00'];
        $appintments =Appointment::where('date',$date)->pluck('time')->toArray();
        if (!$appintments)
            return $allTimes;
        $diffTimes  =array_diff($allTimes,$appintments);
        $diffTimesTwo  =array_diff($appintments,$allTimes);
        $merg = array_merge($diffTimes,$diffTimesTwo);
        return $merg;
    }

    public function package()
    {
        $packages = Packages::all();
        $aboutus = AboutUs::first();
        return view('frontend.packages', compact('packages','aboutus'));
    }

    public function getPackagePrice(Request $request)
    { 
        $package = Packages::find($request->package_id);
        $total = 0 ;
        if ($request->size == 0)
            $total = $package->small_price;
        elseif ($request->size == 1)
            $total = $package->mid_price;
        else
            $total = $package->hi_price;

        if($request->has('addons') && $request->addons != null){
            foreach($request->addons as $addon_id){
                $addon = Addons::find($addon_id);
                if($addon){
                    $total += $addon->price;
                }
            }
        }

        return $total;
    }

    public function forgetMyPassword(Request $request)
    {
        $client  = Clients::where('email',$request->email)->where('status',1)->first();
        if ($client){
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $url = url('reset/password/'.$string.'/'.$client->id); // better than rand()
            $objDemo = new \stdClass();
            $objDemo->title ='Welcome '.$client->name;
            $objDemo->message='Use this code to verify your account:'.$url;
            Mail::to($request->email)->queue(new ForgetPassword($objDemo));
            $client->token = $string;
            $client->save();
            return redirect()->back()->with('success','We sent mail to you please check it');
        }else{
            return redirect()->back()->with('error','Email not exist');
        }
    }

    public function resetPassword($token,$id)
    {
        $client = Clients::where('id',$id)->where('token',$token)->first();
        $aboutus = AboutUs::first();
        if ($client)
            return view('frontend.resetMyPassword',compact('id','aboutus'));
        else
            return redirect('forget/password')->with('error','something wrong please try again');
    }

    public function storeNewPassword($id,Request $request)
    {
        $client = Clients::find($id);
        if ($client && $request->password == $request->c_password){
            $client->password = Hash::make($request->password);
            $client->token = null;
            $client->save();
            return redirect('client/login')->with('success','Password reset successfully');
        }else{
            return redirect()->back()->with('error','Password not matching');
        }
    }

    public function storeComment(Request $request)
    {
        $comment = new Comments();
        $comment->comment = $request->comment;
        $comment->client_id = Auth::guard('client')->user()->id;
        $comment->appointment_id = $request->appointment_id;
        $comment->save();
        return redirect()->back()->with('success','Added SucccessfullySuccessfully');

    }
}
