<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Addons;
use App\Models\Appointment;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\ContractTerms;
use App\Models\Employee;
use App\Models\Packages;
use App\Models\Permission;
use App\Models\Pet;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::withCount('appointments')->orderBy('id','DESC')->get(); 
        return view('admin.clients.index', compact('clients'));
    }


    public function create()
    {

        return view('admin.clients.create');
    }


    public function store(Request $request)
    { 
        $data = $request->all();
        $request->validate([
            'name' => 'required|max: 255',
            'email' => 'required|email|unique:clients', 
            'password' => 'required', 
            'address' => 'required', 
        ]);
        $data['password'] = Hash::make($request->password);
        $data['status'] = 1;
        $client = Clients::create($data); 
        return redirect()->route('admin.clients.index');
    }

    public function show($id)
    {
        $clients=Clients::find($id);
        $clients->load('pets.category');
        return view('admin.clients.show', compact('clients'));
    }


    public function edit($id)
    {
        $clients=Clients::find($id);

        return view('admin.clients.edit', compact('clients'));
    }


    public function update(Request $request, $id)
    {
        $clients=Clients::find($id);
        $clients->password = bcrypt($request->password);
        $clients->save();

        return redirect()->route('admin.clients.index');
    }


    public function active($id)
    {
        $clients=Clients::find($id);
        $clients->status = 1;
        $clients->save();
        alert(trans('flash.success'),'','success');
        return back();
    }


    public function destroy($id)
    {
        $clients=Clients::find($id);
        $clients->delete();
        alert(trans('flash.deleted'),'','success');
        return back();
    }


    public function getTime(Request $request ,$date)
    {
        // $allTimes = ['2:00','3:30','5:00','9:00','10:30','12:00'];
        $allTimes = ['10:00','11:30','1:00','4:00','5:30','7:00']; 
        $id = $client_id ?? 0;
        $appintments = Appointment::where('date',$date);

        if ($request->has('client_id')){
            $appintments = $appintments->where('user_id','!=',$request->client_id);
        }
        if($request->has('appointment_id')){
            $appintments = $appintments->where('id','!=',$request->appointment_id); 
        }

        $appintments = $appintments->pluck('time')->toArray();
        
        if (!$appintments)
            return $allTimes;
        $diffTimes  =array_diff($allTimes,$appintments);
        $diffTimesTwo  =array_diff($appintments,$allTimes);
        $merg = array_merge($diffTimes,$diffTimesTwo);
        return $merg;
    }

    //Contacts --------------------------------------------------------------------------
    public function contacts()
    {
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('admin.contacts',compact('contacts'));
    }

    public function destroy_contact($id){ 
        $contact=Contact::find($id); 
        $contact->delete();
        alert(trans('flash.deleted'),'','success');
        return back();
    }


    //Appointments ----------------------------------------------------------------------
    public function getPets(Request $request){
        $pets = Pet::where('client_id',$request->client_id)->get();
        return $pets;
    }
    public function appointment()
    {
        $appointments = Appointment::with('client','pet.category','package')->orderBy('id','DESC')->get(); 
        return view('admin.appointment.index', compact('appointments'));
    }

    public function addAppointment(){
        $addons = Addons::all();
        $packages = Packages::all();
        $clients = Clients::all();
        return view('admin.appointment.create',compact('addons','packages','clients'));
    }
    public function storeAppointment(Request $request)
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

        $appointment = new Appointment();
        $appointment->user_id = $request->client_id;
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

        
        toast(trans('flash.global.success_title'),'success');
        return redirect()->route('admin.appointment.index');

    }
    public function assign($id)
    {
        $appointment = Appointment::find($id);
        $employees = Employee::all();
        return view('admin.appointment.assign', compact('employees', 'appointment'));
    }
    public function editAppointment($id)
    {
        $appointment = Appointment::find($id); 
        $addons = Addons::all();
        $packages = Packages::all();
        $clients = Clients::all();
        $pets = Pet::where('client_id',$appointment->user_id)->get();
        return view('admin.appointment.edit', compact('addons', 'packages','clients','appointment','pets'));
    }

    public function updateAppointment(Request $request, $id)
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

        $appointment = Appointment::findOrFail($id);
        $appointment->user_id = $request->client_id;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->additional_info = $request->additional_info;
        $appointment->pet_id = $request->pet_id;
        $appointment->package_id = $request->package_id;
        $appointment->addon_id = $request->addon_id ? json_encode($request->addon_id) : $addons; 
        if ($request->size == 0)
            $appointment->size = 'Small';
        elseif ($request->size == 1)
            $appointment->size = 'Medium';
        else
            $appointment->size = 'Large';
        $appointment->price = $package_price + $total_addons;
        $appointment->save(); 

        
        toast(trans('flash.global.update_title'),'success');
        return redirect()->route('admin.appointment.index');

    }

    public function assignAppointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->emp_id = $request->emp_id;
        $appointment->status = "1";
        $appointment->save();
        toast(trans('flash.global.success_title'),'success');
        return redirect('admin/appointments');
    }

    public function showAppointment($id)
    {
        $appointment = Appointment::find($id);

        return view('admin.appointment.show', compact('appointment'));
    }

    public function destroy_appointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        alert(trans('flash.deleted'),'','success');
        return redirect()->route('admin.appointment.index');
    }
}
