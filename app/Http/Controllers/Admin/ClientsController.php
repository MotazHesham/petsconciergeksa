<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Appointment;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\ContractTerms;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::orderBy('id','DESC')->get();
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
        return back();
    }


    //Contacts --------------------------------------------------------------------------
    public function contacts()
    {
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('admin.contacts',compact('contacts'));
    }


    //Appointments ----------------------------------------------------------------------
    public function appointment()
    {
        $appointments = Appointment::with('client','pet.category')->orderBy('id','DESC')->get(); 
        return view('admin.appointment.index', compact('appointments'));
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
        return redirect()->route('admin.appointment.index');
    }
}
