<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Mail\Confirmation;
use App\Models\Employee;
use App\Models\Role;
use Mail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Employee::orderBy('id')->get();
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {

        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $data = $request->all();
        $data['password'] = Hash::make($string);
        $employee = Employee::create($data);
        $objDemo = new \stdClass();
        $objDemo->title ='Welcome '.$employee->name;
        $objDemo->message='your password is:'.$string;
        Mail::to($request->email)->queue(new Confirmation($objDemo));
        return redirect()->route('admin.employee.index');
    }

    public function edit(Employee $employee)
    {

        return view('admin.employee.edit', compact( 'employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('admin.employee.index');
    }

    public function show(Employee $employee)
    {


        return view('admin.employee.show', compact('employee'));
    }

    public function destroy(Employee $employee)
    {

        $employee->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeeRequest $request)
    {
        Employee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
