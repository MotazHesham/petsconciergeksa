@extends('frontend.master')

@section('content')
    <!-- Full Page Image Background Slider -->

    <div class="slider-container">

        <!-- Controls -->

        <div class="slider-control left inactive"></div>

        <div class="slider-control right"></div>

        <ul class="slider-pagi"></ul>

        <!--Slider -->

        <div class="slider">

            <!-- Slide 1 -->

            <div class="slide slide-0 active" style="background-image:url('{{ url('/frontend/img/slide1.jpg') }}')">

                <div class="slide__bg"></div>

                <div class="slide__content">

                    <div class="slide__overlay">

                    </div>

                    <!-- slide text-->

                    <div class="slide__text">

                        <h1 class="slide__text-heading">Welcome to Pets Concierge</h1>

                        <div class="hidden-mobile">

                            <p class="lead"> The best mobile pet grooming services </p>

                            <a href="{{ url('aboutus') }}" class="btn btn-default">Explore Now </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Slide 0 -->

            <div class="slide slide-1" style="background-image:url('{{ url('/frontend/img/slide0.jpg') }}')">

                <div class="slide__bg"></div>

                <div class="slide__content">

                    <div class="slide__overlay">

                    </div>

                    <!-- slide text-->

                    <div class="slide__text">

                        <h1 class="slide__text-heading">Book an Appointment </h1>

                        <div class="hidden-mobile">

                            <p class="lead">We Style Your pet at your door step</p>

                            <a href="{{ url('packages') }}" class="btn btn-default">Book Now</a>

                        </div>

                    </div>

                </div>

            </div>





        </div>

        <!--/Slider-->

    </div>

    <!--/ Slider ends -->



    <!-- Section Services-index -->

    <section id="services-index">

        <!-- container -->

        <div class="container">

            <div class="section-heading">

                <h2>Our Services</h2>

            </div>



            <!-- /col-md-10-->

        </div>

        <!-- /container-->

        <div class="container  margin1">

            <div class="row">

                <div class="col-md-3 col-lg-3 col-md-offset-1">

                    <div class="HomeServ0">

                        <img src="{{ url('/frontend/img/Group%202.png') }}" width="80">



                        <p>Gland Cleaning</p>

                    </div>



                    <div class="HomeServ0">

                        <img src="{{ url('/frontend/img/Mask%20Group%201.png') }}" width="80">

                        <p>Hair Cut, Trim Or Shave</p>

                    </div>





                    <div class="HomeServ0">

                        <img src="{{ url('/frontend/img/Mask%20Group%206.png') }}" width="60">

                        <p>Sanitary Trim</p>

                    </div>

                </div>





                <div class="col-md-4 col-lg-4">

                    <img src="{{ url('/frontend/img/about.png') }}" class="img-responsive">

                </div>





                <div class="col-md-3 col-lg-3 ">

                    <div class="HomeServ01">

                        <img src="{{ url('/frontend/img/Mask%20Group%203.png') }}" width="80">



                        <p>Fluff Dry</p>

                    </div>



                    <div class="HomeServ01">

                        <img src="{{ url('/frontend/img/Mask%20Group%208.png') }}" width="80">

                        <p>Tail Hair Trim</p>

                    </div>





                    <div class="HomeServ01">

                        <img src="{{ url('/frontend/img/Mask%20Group%209.png') }}" width="60">

                        <p>Tear Stain Remover</p>

                    </div>

                </div>

            </div>

            <!-- /row -->

        </div>

        <!-- /container-fluid-->

    </section>

    <!-- Section About-index -->

    <section id="about-index" class="pink-bg color-white padding-0">

        <div class="container">



            <!-- row -->

            <div class="row">

                <div class="col-md-6 col-lg-5">



                    <img src="{{ url('/frontend/img/about-index.png') }}" class="img-responsive" alt="">

                </div>

                <div class="col-md-6 col-lg-7 ">

                    <div class="about-home-content">

                        <h2 class="color-white">About Us</h2>

                        <p>

                            {{ $aboutus->descripton }}

                        </p>



                    </div>

                </div>

                <!-- /col-md-7-->





                <!-- /col-md-5-->

            </div>



        </div>

        <!-- /container -->

    </section>

    <!-- /section ends -->



    <!-- Section Gallery -->

    <!--     <section id="gallery">

            <div class="section-heading">

                <h2>OUR Gallery</h2>

            </div>

            <div class="container">

                <div class="nav-gallery col-md-12">


                    <div class="text-center col-md-12">

                        <ul class="nav nav-pills category text-center" role="tablist" id="gallerytab">

                            <li class="active"><a href="#" data-toggle="tab" data-filter="*">All</a>



                            @foreach ($category as $categ)
    <li><a href="#" data-toggle="tab" data-filter=".{{ $categ->id }}">{{ $categ->name }}</a></li>
    @endforeach



                        </ul>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-12 margin1">

                        <div id="lightbox">




                            @foreach ($gallery as $gall)
    <div class="col-xs-6 col-md-6 col-lg-2 {{ $gall->category_id }}">

                                <div class="portfolio-item">

                                    <div class="gallery-thumb">

                                        <img class="img-responsive" src="{{ URL::asset('storage/app/public/attachment/' . $gall->image) }}" alt="">

                                        <span class="overlay-mask"></span>

                                        <a href="{{ URL::asset('storage/app/public/attachment/' . $gall->image) }}" data-gal="prettyPhoto[gallery]" class="link centered" title="">

                                            <i class="fa fa-expand"></i></a>

                                    </div>

                                </div>

                            </div>
    @endforeach



                        </div>


                    </div>


                </div>


            </div>


        </section> -->

    <!-- Section ends -->

    <div class="container-fluid">

        <!-- Section Call to action -->

        <section class="call-to-action padding-0 pink-bg pink-bg2">

            <div class="container ">



                <!-- well -->

                <div class="col-md-5 col-md-offset-3">

                    <div class="text">

                        <h2 class="color-white">EASY& Quickly</h2>

                        <h3 class="color-white"> BOOK AN APPOINTMENT</h3>

                        <a href="{{ url('packages') }}" class="btn btn-default btn-blue">Make an appointment</a>

                    </div>

                    <!-- /col-md-12 -->

                </div>

                <!-- /col-md-6 -->

                <div class="col-md-3"> <img src="{{URL::asset('storage/app/public/attachment/' . $aboutus->image_about_us)}}" class="img-responsive dog-home">
                </div>

            </div>

            <!-- /container -->

        </section>

        <!-- /Section ends -->

    </div>

    <!-- /container-fluid -->

    <!-- Section Reviews -->

    <section id="reviews">

        <div class="container">

            <div class="section-heading text-center">

                <h2>Clients Reviews</h2>

            </div>

            <!-- Parallax object -->



            <!-- /col-md-3 -->

            <div class="col-md-9 col-md-offset-3">

                <!-- Reviews -->

                <div id="owl-reviews" class="owl-carousel margin1">

                    <!-- review 1 -->
                    @foreach ($comments as $comment)
                        <div class="review">

                            <div class="col-xs-12">

                                <!-- caption -->

                                <div class="review-caption">

                                    <h5>{{ $comment->client->name ?? '' }}</h5>

                                    <div class="small-heading">

                                        {{ $comment->appointment->pet->name ?? '' }}

                                    </div>

                                    <blockquote>
                                        {!! $comment->$comment !!}
                                    </blockquote>

                                </div>

                                <!-- Profile image -->

                                {{--                            <div class="review-profile-image"> --}}

                                {{--                                <img src="{{url('/frontend/img/review1.jpg')}}" alt=""/> --}}

                                {{--                            </div> --}}

                                <!--/review profile image -->

                            </div>

                            <!-- /col-xs-12 ends -->

                        </div>
                    @endforeach


                </div>

                <!-- /owl-carousel -->

            </div>

            <!-- /col-md-10 -->

        </div>

        <!-- /.container -->

    </section>

    <!-- /Section ends -->
@endsection
