<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Clients;
use App\Models\Comments;
use App\Models\Projects;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class HomeController
{
    public function index()
    {
        $clients_count = count(Clients::all());
        $appointments_count = count(Appointment::all());
        $comments = count(Comments::all());
        $todayAppointments = count(Appointment::whereDate('date', '=', date('Y-m-d'))->get());

        $settings1 = [
            'chart_title'           => 'Appointments',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Appointment',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at', 
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'appointment',
        ];

        $chart1= new LaravelChart($settings1);

        $settings2 = [
            'chart_title'           => 'Appointments Revenue',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Appointment',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'sum',
            'aggregate_field'       => 'price',
            'filter_field'          => 'created_at', 
            'group_by_field_format' => 'd/m/Y',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'appointment',
        ];

        $chart2= new LaravelChart($settings2);

        $appointments  = Appointment::with('client','package')->latest()->take(5)->get(); 
        $clients  = Clients::latest()->take(5)->get(); 

        return view('home', compact('clients_count', 'appointments_count', 'todayAppointments','comments','chart1','chart2','appointments','clients'));
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
