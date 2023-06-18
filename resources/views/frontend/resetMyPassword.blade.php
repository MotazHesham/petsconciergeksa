@extends('frontend.master')
@section('content')
    <!-- /navbar ends -->
    <!-- Section Contact -->
    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5" style="background: url({{URL::asset('storage/app/public/attachment/' . $aboutus->image_login)}});">
            <!-- Heading -->

        </div>
        <!-- container -->
        <div class="container">
            <div class="row">

                <!-- Contact Form -->
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 res-margin">

                    <!-- Form Starts -->
                    <div class="login_form">
                        @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>

                        @elseif(Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        <form method="post" action="{{url('store/new/password/'.$id)}}">
                            @csrf
                            <div class="form-group">
                                <label>Password<span class="required">*</span></label>
                                <input type="password" name="password" class="form-control input-field" required="">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password<span class="required">*</span></label>
                                <input type="password" name="c_password" class="form-control input-field" required="">
                            </div>
                            <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Submit
                            </button>
                        </form>
                    </div>
                    <!-- Contact results -->
                    <div id="contact_results"></div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>

    </section>
    <!-- /Section ends -->
    <!-- Footer -->
    <!-- Footer -->
@endsection