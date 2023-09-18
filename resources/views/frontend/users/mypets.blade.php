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
                            <li><a href="{{ url('client/loyalty_cards') }}">Loyalty Cards</a></li>
                            <li><a href="{{url('client/profile')}}">Edit account</a>  </li>
                            <li><a href="{{url('client/signout')}}">Logout</a>  </li>
                        </ul>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-9 col-md-9">
                    <!-- Form Starts -->
                    <div class="mypets">
                        <div class="row">
                            @foreach($pets as $pet)

                            <div class="col-lg-4 col-md-4">
                                <div class="mpet">
                                    @if($pet->image)
                                        <a href="{{url('client/petDetails', $pet->id)}}">
                                            <img src="{{URL::asset('storage/app/public/attachment/' . $pet->image)}}" style="width: 80px; height: 80px;">
                                        </a>
                                    @else
                            
                                        <a href="{{url('client/petDetails', $pet->id)}}">
                                            <img src="{{ URL::asset('storage/app/public/attachment/' . $aboutus->logo) }}" style="width: 80px; height: 80px;">
                                        </a>
                                    @endif
                                    <h5><a href="{{url('client/petDetails', $pet->id)}}">{{$pet->name}}</a></h5>
                                    <p>Age : {{$pet->age ?? '-'}}</p>
                                    <p>Gender : {{$pet->gender}}</p>
                                    <p>{{$pet->category->name}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Contact results -->
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