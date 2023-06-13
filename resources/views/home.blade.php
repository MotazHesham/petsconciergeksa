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
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-secondary b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span class="m-0">{{ trans('cruds.clients.title_singular') }}</span>
                                                    <h4 class="mb-0 counter">{{$clients}}</h4>
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
                                                <div class="media-body"><span class="m-0">{{ trans('cruds.appointment.title_singular') }}</span>
                                                    <h4 class="mb-0 counter">{{$appointments}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden">
                                        <div class="bg-primary b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                </div>
                                                <div class="media-body"><span class="m-0">Today's Appointments</span>
                                                    <h4 class="mb-0 counter">{{$todayAppointments}}</h4>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection