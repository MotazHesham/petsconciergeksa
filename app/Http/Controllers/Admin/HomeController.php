<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Clients;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HomeController
{
    public function index()
    {
        $clients = count(Clients::all());
        $appointments = count(Appointment::all());
        $todayAppointments = count(Appointment::whereDate('date', '=', date('Y-m-d'))->get());

        return view('home', compact('clients', 'appointments', 'todayAppointments'));
    }
    public function invoice()
    {
        $projects=Projects::all();
        return view('admin.invoice',compact('projects'));
    }
    public function create_invoice()
    {
        $projects=Projects::all();
        $users=User::all();

        return view('admin.create_invoice',compact('projects','users'));
    }
    public function selectInvoice(Request $request)
    {
        $project=Projects::with('suppliers','clients')->where('id',$request->project)->first();
        $month=$request->month;
        $date=new Carbon($request->month);
        $first_month=$date->firstOfMonth();
        $end_month=$date->endOfMonth();
        $tasks=Tasks::where('project_id',$request->project)
            ->whereMonth('date','>=',$first_month)
            ->whereMonth('date','<=',$end_month)->get();
        return view('admin.getInvoice',compact('project','tasks','month'));
    }
}
