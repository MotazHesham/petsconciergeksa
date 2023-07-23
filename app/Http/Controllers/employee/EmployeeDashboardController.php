<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Gallery;
use App\Models\Pet;
use App\Models\Service;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class EmployeeDashboardController extends Controller
{

    public function login(Request $request)
    {
        if ($request->post()){
            $client =Employee::where('email',$request->email)->first();
            if ($client == null){
                return redirect()->back()->with('error','email not exist');
            }else if(!Hash::check($request->password, $client->password))
            {
                return redirect()->back()->with('error',"incorrect password");
            }
            Auth::guard('employee')->login($client);
            return redirect('/employee/todayappointment');
        }
        return view('employee.login');
    }
    public function logout(Request $request) {
        Auth::logout();
        Auth::guard('employee')->logout();
        return redirect('/employee/login');
    }

    public function edit()
    {
        return view('employee.edit');
    }

    public function update(Request $request)
    {
        $employee = Employee::find(Auth::guard('employee')->user()->id);
        if ($request->password == $request->password_confirmation){
            $employee->password = Hash::make($request->password);
            $employee->save();
        }else{
            return redirect()->back()->with('message', __('global.password_not_matching'));

        }

        return redirect()->back()->with('message', __('global.change_password_success'));
    }

    public function appointment()
    {
        $appointments = Appointment::where('emp_id', Auth::guard('employee')->user()->id)
            ->where('status','2')
            ->with('client', 'pet.category', 'package')->orderBy('id','DESC')->get();

        return view('employee.appointment.index', compact('appointments'));
    }

    public function editappointment($id)
    {
        $appointment = Appointment::find($id);

        return view('employee.appointment.edit', compact('appointment'));
    }

    public function updateappointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = $request->status;
        $appointment->comment = $request->comment;
        $appointment->save();

        return redirect(Route('employee.appointment.index'));
    }

    public function todayappointment()
    {
        $appointments = Appointment::where('emp_id', Auth::guard('employee')->user()->id)
            ->whereDate('date','=',date('Y-m-d'))
            ->where('status','1')
            ->with('client', 'pet.category', 'package')->orderBy('id','DESC')->get();
        return view('employee.appointment.todayappointment', compact('appointments'));

    }
}
