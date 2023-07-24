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
        $clients = Clients::create($request->all());
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
        $clients->update($request->all());

        return redirect()->route('admin.clients.index');
    }


    public function destroy($id)
    {
        $clients=Clients::find($id);
        $clients->delete();
        alert(trans('flash.deleted'),'','success');
        return back();
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
    public function editAppointment($id)
    {
        $appointment = Appointment::find($id);
        $employees = Employee::all();
        return view('admin.appointment.edit', compact('employees', 'appointment'));
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
