@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-info b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span
                                                        class="m-0">{{ trans('cruds.clients.title_singular') }}</span>
                                                    <h4 class="mb-0 counter">{{ $clients_count }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-success b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span
                                                        class="m-0">{{ trans('cruds.appointment.title_singular') }}</span>
                                                    <h4 class="mb-0 counter">{{ $appointments_count }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-warning b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span
                                                        class="m-0">{{ trans('cruds.comments.title_singular') }}</span>
                                                    <h4 class="mb-0 counter">{{ $comments }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-danger b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span
                                                        class="m-0">{{ trans('cruds.appointment.fields.todayappointments') }}</span>
                                                    <h4 class="mb-0 counter">{{ $todayAppointments }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="{{ $chart1->options['column_class'] }}">
                                    <h3>{!! $chart1->options['chart_title'] !!}</h3>
                                    {!! $chart1->renderHtml() !!}
                                </div>
                                <div class="{{ $chart2->options['column_class'] }}">
                                    <h3>{!! $chart2->options['chart_title'] !!}</h3>
                                    {!! $chart2->renderHtml() !!}
                                </div>
                                {{-- Widget - latest entries --}}
                                <div class="col-md-6 mt-5" style="overflow-x: auto;">
                                    <div class="card">
                                        <div class="card-header">Latest 5 Requested Apointments</div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.appointment.fields.name') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.appointment.fields.date') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.appointment.fields.package') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.appointment.fields.price') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.appointment.fields.created_at') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($appointments as $appointment)
                                                        <tr data-entry-id="{{ $appointment->id }}">
                                                            <td>
                                                                {{ $appointment->client->name ?? '' }}
                                                                <br>
                                                                {{ $appointment->client->email ?? '' }}
                                                            </td> 
                                                            <td>
                                                                {{ $appointment->date . ' ' . $appointment->time }}
                                                            </td>
                                                            <td>
                                                                {{ $appointment->package->name ?? '' }}
                                                                <br> 
                                                                @if($appointment->addon_id != null)
                                                                    <hr>
                                                                    @foreach(json_decode($appointment->addon_id) as $id)
                                                                        @php
                                                                            $addon = \App\Models\Addons::find($id);
                                                                            $addon_name = $addon ? $addon->name : '';
                                                                        @endphp
                                                                        <small class="badge badge-dark">{{ $addon_name }}</small> <br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ $appointment->price }}
                                                                @if($appointment->is_it_loyalty_appoint)
                                                                <br>
                                                                    <span class="badge badge-danger">it's loyalty Card</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $appointment->created_at }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">
                                                                {{ __('No entries found') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div> 
                                {{-- Widget - latest entries --}}
                                <div class="col-md-6 mt-5" style="overflow-x: auto;">
                                    <div class="card">
                                        <div class="card-header">Latest 5 Registered Clients</div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            {{ trans('cruds.clients.fields.name') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.clients.fields.email') }}
                                                        </th>
                                                        <th>
                                                            {{ trans('cruds.clients.fields.phone') }}
                                                        </th> 
                                                        <th>
                                                            {{ trans('cruds.clients.fields.created_at') }}
                                                        </th> 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($clients as $client)
                                                        <tr data-entry-id="{{ $client->id }}">
                                                            <td>
                                                                {{ $client->name ?? '' }} 
                                                            </td>
                                                            <td>
                                                                {{ $client->email ?? '' }} 
                                                            </td>
                                                            <td>
                                                                {{ $client->phone ?? '' }} 
                                                            </td>
                                                            <td>
                                                                {{ $client->created_at ?? '' }} 
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">
                                                                {{ __('No entries found') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div> 
                            </div>

                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart2->renderJs() !!}
@endsection
