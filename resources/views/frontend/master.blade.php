<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <!--[if IE]>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- Page title -->

    <title>Petsconciergeksa</title>

    <!--[if lt IE 9]>

    <script src="{{url('/frontend/js/respond.js')}}"></script>

    <![endif]-->

    <!-- Bootstrap Core CSS -->

    <link href="{{url('/frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css">

    <!-- Icon fonts -->

    <link href="{{url('/frontend/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('/frontend/fonts/flaticons/flaticon.css')}}" rel="stylesheet" type="text/css">

    <link href="{{url('/frontend/fonts/glyphicons/bootstrap-glyphicons.css')}}" rel="stylesheet" type="text/css">

    <!-- Google fonts -->

    <link href="https://fonts.googleapis.com/css?family=Lato:400,800" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">

    <!-- Style CSS -->

    <link href="{{url('/frontend/css/style.css')}}" rel="stylesheet">

    <!-- Plugins CSS -->

    <link rel="stylesheet" href="{{url('/frontend/css/plugins.css')}}">

    <!-- Color Style CSS -->

    <link href="{{url('/frontend/styles/maincolors.css')}}" rel="stylesheet">

    <!-- Favicons-->

    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="page-top">

<!-- Preloader -->

<div id="preloader">

    <div class="spinner">

        <div class="bounce1"></div>

    </div>

</div>

<!-- Preloader ends -->

<nav class="navbar navbar-custom navbar-fixed-top">

    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">

                <i class="fa fa-bars"></i>

            </button>

            <div class="navbar-brand">

                <a href="#page-top">

                    <!-- logo  -->

                    <img src="{{url('/frontend/img/logo.png')}}" class="img-responsive" alt="">

                </a>

            </div>

        </div>

        <!--/navbar-header -->

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="navbar-brand-centered">



            <ul class="nav navbar-nav navbar-right">

                <li ><a href="{{url('/')}}">Home</a></li>





                <li><a href="{{url('/aboutus')}}">About</a></li>

                <!--/navbar-header  <li class="dropdown">

                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<b class="caret"></b></a>

                <ul class="dropdown-menu">

                   <li><a href="adoption.html">Adoption</a></li>

                   <li><a href="adopt-single.html">Adoption Single</a></li>

                   <li><a href="services.html">Our Services</a></li>

                   <li><a href="services-single.html">Services Single</a></li>

                   <li><a href="team.html">Our Team</a></li>

                   <li><a href="pricing.html">Pricing</a></li>

                   <li><a href="testimonials.html">Testimonials</a></li>

                   <li><a href="elements.html">Elements</a></li>

                </ul>

             </li>--->

{{--                <li><a href="{{url('/service')}}">Services</a></li>--}}

                <li><a href="{{url('/packages')}}">Packages</a></li>



{{--                <li><a href="{{url('gallery')}}">Gallery</a></li>--}}

                <li><a href="{{url('contact')}}">Contact</a></li>



                @if(isset(Auth::guard('client')->user()->id))

                    <li ><a href="{{url('/client/my/pets')}}">Profile</a></li>

                    <li class="activeapp" ><a href="{{url('packages')}}"><img src="{{url('/frontend/img/calendar.png')}}" class="Loginicon">Make Appointment</a></li>

                @else

                <li class="active" ><a href="{{url('client/login')}}"><img src="{{url('/frontend/img/login2.png')}}" class="Loginicon" width="40">login</a></li>

                @endif

            </ul>

        </div>

        <!-- /.navbar-collapse -->

    </div>

    <!-- /.container -->

</nav>



@yield('content')



<!-- Footer -->

<footer>

    <!-- Contact info -->

    <div class="container">

        <div class="text-center">

            <!-- Footer logo -->

            <img src="{{url('/frontend/img/logo.png')}}" alt="" class="center-block img-responsive">

        </div>

        <!-- /.col-md-4 -->

        <div class="res-margin">

            <h5>Quick link</h5>

            <ul class="list-unstyled">



                <li><i class="fa fa-phone"></i>(00966) 555342116</li>

                <li><i class="fa fa-envelope"></i> <a href="mailto:your@email.com">  info@petsconciergeksa.com</a></li>

                <li><i class="fa fa-map-marker"></i>  Jeddah , Saudi Arabia</li>

            </ul>

        </div>

        <!-- /.col-md-4 -->

        <div class=" res-margin">

            <h5>Follow us</h5>

            <!--Social icons -->

            <div class="social-media">

                <a href="#" title=""><i class="fa fa-twitter"></i></a>

                <a href="#" title=""><i class="fa fa-facebook"></i></a>

                <a href="#" title=""><i class="fa fa-google-plus"></i></a>

                <a href="#" title=""><i class="fa fa-instagram"></i></a>

            </div>

        </div>

        <!-- /.col-md-4 -->

    </div>

    <!-- /.container -->

    <!-- Credits-->

    <div class="credits col-md-12 text-center">

        Copyright © 2022 - Designed by <a href="#">AllianceVision</a>

        <!-- Go To Top Link -->

        <div class="page-scroll hidden-sm hidden-xs">

            <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        </div>

    </div>

    <!-- /credits -->

</footer>

<!-- /footer ends -->

<!-- Core JavaScript Files -->

<script src="{{url('/frontend/js/jquery.min.js')}}"></script>

<script src="{{url('/frontend/js/bootstrap.min.js')}}"></script>

<!-- Main Js -->

<script src="{{url('/frontend/js/main.js')}}"></script>

<!-- Contact form -->

<script src="{{url('/frontend/js/contact.js')}}"></script>

<!--Other Plugins -->

<script src="{{url('/frontend/js/plugins.js')}}"></script>

<!-- Prefix free CSS -->

<script src="{{url('/frontend/js/prefixfree.js')}}"></script>

<!--Mail Chimp validator -->

<script src='{{url('/frontend/js/mc-validate.js')}}'></script>

<!-- Open street maps-->

<script src="{{url('/frontend/js/map.js')}}"></script>

@yield('scripts')

</body>

</html>