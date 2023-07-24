<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Appointment',
            'date_field' => 'date',
            'field'      => 'date',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.appointment.edit',
        ], 
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach (Appointment::with('client','package')->get() as $appointment) {
                $crudFieldValue = $appointment->getAttributes()['date'];

                if (! $crudFieldValue) {
                    continue;
                }

                $client_name = $appointment->client->name ?? '';
                $package = $appointment->package->name ?? '';
                $events[] = [
                    'title' => trim($client_name . ' ' . $package),
                    'start' => $crudFieldValue . ' ' . Appointment::SELECT_TIME[$appointment->time],
                    'url'   => route('admin.appointment.edit', $appointment->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
