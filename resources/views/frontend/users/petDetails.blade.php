@extends('frontend.master')
@section('content')

    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="sideMenu">
                        <a href="{{url('packages')}}" class="btn btn-default">Make appointment</a>
                        <ul>
                            <li><a href="{{url('client/my/pets')}}">My Pets</a>  </li>
                            <li><a href="{{url('client/add/pet')}}">Add Pet</a>  </li>
                            <li><a href="{{url('client/visits')}}">All Visits</a>  </li>
                            <li><a href="{{url('client/profile')}}">Edit account</a>  </li>
                            <li><a href="{{url('client/signout')}}">Logout</a>  </li>
                        </ul>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @if($pet->image)
                            <div class="col-md-4"><img src="{{URL::asset('storage/app/public/attachment/' . $pet->image)}}" style="width: 150px; height: 150px;"></div>
                        @else
                            <div class="col-md-4"><img src="{{url('/frontend/img/logo.png')}}" style="width: 150px; height: 150px;"></div>

                        @endif

                        <div class="col-md-8">
                            <h4>{{$pet->name}}</h4>
                            <div class="category"> {{$pet->category->name}}</div>
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>--}}
                        </div></div>
                    <!-- Form Starts -->
                    <hr/>
                    <div class="row">
                        <h5>Visits history</h5>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>

                                <th>Date</th>
                                <th>Package</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->date .' '. $appointment->time }}</td>
                                <td>{{ $appointment->package->name ?? '' }}</td>
                                <td>
                                  {!! $appointment->comment !!}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Contact results --></div>
                    <div id="contact_results"></div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->

        <!-- /container-fluid-->
    </section>
@endsection