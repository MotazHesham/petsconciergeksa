<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Appointment',
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'employee.appointment.edit',
        ], 
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) { 
            foreach (Appointment::with('client','package')->orderBy('id','DESC')->get() as $appointment) {
                $crudFieldValue = $appointment->getAttributes()['date'];

                if (! $crudFieldValue) {
                    continue;
                }

                $client_name = $appointment->client->name ?? '';
                $package = $appointment->package->name ?? '';
                $events[] = [
                    'title' => trim($client_name . ' ' . $package),
                    'start' => $crudFieldValue . ' ' . Appointment::SELECT_TIME[$appointment->time],
                    'url'   => route('employee.appointment.edit', $appointment->id),
                ];
            }
        }

        return view('employee.calendar.calendar', compact('events'));
    }
}
