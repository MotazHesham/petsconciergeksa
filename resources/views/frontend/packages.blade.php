@extends('frontend.master')
@section('content')

    <section id="pricing" class="pages"> 
      <div class="inside-banner">
         <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_packages)}}" class="img-responsive">
         <!-- Heading -->
      
      </div>
        <!-- container -->
        <div class="container">


         <row>
            <h3 class="text-center">Pets Concierge size guide line</h3>
            <br />
         </row>
         
         <div class="row">
            <div class="col-md-2 col-xs-4">
               <img src="{{url('/frontend/img/cate-size-sm.png')}}" class="img-responsive bo-r-20">
            </div>

            <div class="col-md-2 col-xs-4">
               <img src="{{url('/frontend/img/cate-size-large.png')}}" class="img-responsive  bo-r-20">
            </div>

            <div class="col-md-2"></div>



            <div class="col-md-2 col-xs-4">
               <img src="{{url('/frontend/img/dog-size-sm.png')}}" class="img-responsive bo-r-20">
            </div>

            <div class="col-md-2  col-xs-4">
               <img src="{{url('/frontend/img/dog-size-md.png')}}" class="img-responsive  bo-r-20">
            </div>

            <div class="col-md-2 col-xs-4">  <img src="{{url('/frontend/img/dog-size-large.png')}}" class="img-responsive  bo-r-20"></div>

            
            </div>
            <!-- /col-md-6 -->
            <!-- image -->
         
            <!-- /col-md-3 -->
      
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
                            @if ($package->services_id && $package->services_id != 'null')
                            @foreach(json_decode($package->services_id) as $key=>$service)
                                <?php
                                    $serviceID = \App\Models\Service::find($service);
                                    ?>
                                <li>{{$key+1 .': '. $serviceID->name}}
                                </li>
                                @endforeach
                            @endif
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
                            <br><br>
                            <b>Inclusive VAT</b>
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