@extends('frontend.master')
@section('content')

    <section id="services" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        <!-- container-->
        <div class="container">
            <div id="services" class="">
                <!-- /row-->
                <div class="row">
                    <!-- owl-services -->

                    @foreach($services as $serv)
                    <!-- Feature Box 1  -->
                    <div class="col-md-4 col-xs-12" style="">
                        <div class="box_icon ">
                            <div class="icon ">
                                <!-- icon -->
                                <div class="image ">
                                    <img src="{{URL::asset('storage/app/public/attachment/' . $serv->image)}}"alt="" style="height: 150px; width: 150px">
                                </div>
                                <div class="info">
                                    <h4>{{$serv->name}}</h4>
                                    <p>{!! $serv->description !!} </p>
                                    <!-- Button-->
                                    <a class="btn" href="{{url('packages')}}">Book an Appointment</a>
                                </div>
                            </div>
                        </div>
                        <!-- /box_icon -->
                    </div>
                    @endforeach

                    <!-- /col-xs-12 ends -->
                </div>
                <!-- /owl-services -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>


@endsection