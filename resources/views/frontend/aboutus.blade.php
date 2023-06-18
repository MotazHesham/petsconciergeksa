@extends('frontend.master')

@section('content')



    <section id="about" class="pages">

        <div class="jumbotron" style="background: url({{URL::asset('storage/app/public/attachment/' . $aboutus->image_about_us)}}" data-stellar-background-ratio="0.5">

            <!-- Heading -->



        </div>

        <!-- container -->

        <div class="container">

            <div class="row">



                <div class="col-md-4 col-lg-4 col-md-offset-4">

                    <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_about_us)}}" class="img-responsive">

                </div>

                <div class="col-lg-12 col-md-12 text-center">



                    <p> {{$aboutus->descripton}} </p>



                </div>

                <!-- /col-lg-7 -->

                <!-- image -->



                <!-- /col-lg-5-->

            </div>





            <section>

                <div class="row">

                    <div class="col-md-5 text-center col-md-offset-1"  >

                        <img src="{{url('/public/frontend/img/Vector%20Smart%20Object-2.png')}}" class="img-responsive">





                        <img src="{{url('/public/frontend/img/vision.png')}}" width="80px">

                        <h5 class="font-bold" >OUR Mission</h5>

                        <p > {{$aboutus->mission}} </p>

                        <img src="{{url('/public/frontend/img/Vector%20Smart%20Object.png')}}" class="img-responsive">

                    </div>





                    <div class="col-md-5 text-center  " >

                        <img src="{{url('/public/frontend/img/Vector%20Smart%20Object-2.png')}}" class="img-responsive">





                        <img src="{{url('/public/frontend/img/103717.png')}}" width="80px">

                        <h5 class="font-bold">OUR VISION</h5>

                        <p > {{$aboutus->vision}} </p>

                        <img src="{{url('/public/frontend/img/Vector%20Smart%20Object.png')}}" class="img-responsive">

                    </div>

                    <!-- /row -->



                    <!-- /row -->

                </div>



            </section>

            <!-- /container--></div>

    </section>



@endsection