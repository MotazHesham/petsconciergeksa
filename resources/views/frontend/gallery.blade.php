@extends('frontend.master')

@section('content')

    <section id="gallery" class="pages">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        <div class="container">
            <div class="nav-gallery col-md-12">
                <!-- Gallery Navigation -->
                <div class="text-center col-md-12">
                    <ul class="nav nav-pills category text-center" role="tablist" id="gallerytab">
                        <li class="active"><a href="#" data-toggle="tab" data-filter="*">All</a>

                        @foreach($category as $categ)
                        <li><a href="#" data-toggle="tab" data-filter=".{{$categ->id}}">{{$categ->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <!-- /nav-gallery -->
            <!-- Gallery Starts-->
            <div class="row">
                <div class="col-md-12 margin1">
                    <div id="lightbox">
                        <!-- Image 1 -->

                        @foreach($gallery as $gall)
                        <div class="col-sm-6 col-md-6 col-lg-3 {{$gall->category_id}}">
                            <div class="portfolio-item">
                                <div class="gallery-thumb">
                                    <img class="img-responsive" src="{{URL::asset('storage/app/public/attachment/' . $gall->image)}}" alt="" >
                                    <span class="overlay-mask"></span>
                                    <a href="{{URL::asset('storage/app/public/attachment/' . $gall->image)}}" data-gal="prettyPhoto[gallery]" class="link centered" title="">
                                        <i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!-- /lightbox-->
                </div>
                <!-- /col-md-12-->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>

@endsection