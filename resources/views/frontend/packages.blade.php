@extends('frontend.master')
@section('content')

    <section id="pricing" class="pages">
        <div class="jumbotron" style="background: url({{URL::asset('storage/app/public/attachment/' . $aboutus->image_packages)}}" data-stellar-background-ratio="0.5">
            <!-- Heading -->
{{--            <div class="jumbo-heading" data-stellar-background-ratio="1.2">--}}
{{--                <h1>Packages</h1>--}}
{{--            </div>--}}
        </div>
        <!-- container -->
        <div class="container">

            <!-- /row -->
            <div class="price-table margin1">
                <!-- Price table 1 -->
                <!-- /Price table 1 -->
                <!-- Price table 3 -->
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-4">
                    <div class="plan featured">
                        <!-- price table header -->
                        <header>
{{--                            <i class="flaticon-long-haired-dog-head"></i>--}}
                            <h5 class="plan-title">
                                {{$package->name}}
                                <br>
                            </h5>
{{--                            <div class="plan-cost"><span class="plan-price">{{$package->hi_price}}</span></div>--}}
                        </header>
                        <!-- plan features -->
                        <ul class="plan-features">
                            @foreach(json_decode($package->services_id) as $key=>$service)
                                <?php
                                    $serviceID = \App\Models\Service::find($service);
                                    ?>
                                <li>{{$key+1 .': '. $serviceID->name}}
                                </li>
                                @endforeach
                        </ul>
                        <!--/ plan features -->
                        <!-- button -->
                                <div style="display:flex;justify-content: space-around;padding:15px">
                                    <div >
                                        <b>Small</b>
                                        <small>{{$package->small_price}}</small>
                                    </div>
                                    <div >
                                        <b>Medium</b>
                                        <small>{{$package->mid_price}}</small>
                                    </div>
                                    <div >
                                        <b>Large</b>
                                        <small>{{$package->hi_price}}</small>
                                    </div>
                                </div>
                        <div class="text-center">
                            <a class="btn" href="{{url('client/appointment/'.$package->id)}}">Book An Appointment</a>
                        </div>
                        <!-- /text-center -->
                    </div>
                </div>
                @endforeach
                <!-- /Price table 3 -->

            </div>
            <!-- /Price tables  ends -->
        </div>
        <!-- /container-->
    </section>

@endsection