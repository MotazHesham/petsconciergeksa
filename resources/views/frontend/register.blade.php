@extends('frontend.master')

@section('content')

    <section id="contact" class=" pages pages2 no-padding">

        <div class="jumbotron" data-stellar-background-ratio="0.5" style="background: url({{URL::asset('storage/app/public/attachment/' . $aboutus->image_login)}});">

            <!-- Heading -->



        </div>

        <!-- container -->

        <div class="container">

            <div class="row">



                <!-- Contact Form -->

                <div class="res-margin">



                    <!-- Form Starts -->

                    <div class="login_form">

                        @if(Session::has('success'))

                            <p class="alert alert-success">{{ Session::get('success') }}</p>



                        @elseif(Session::has('error'))

                            <p class="alert alert-danger">{{ Session::get('error') }}</p>

                        @endif

                        <form method="post" action="{{url('storeClientRegister')}}">

                            @csrf

                        <div class="form-group">

                            <div class="col-md-6">
                                <label>Full name<span class="required">*</span></label>

<input type="text" name="name" class="form-control input-field" required="" value="{{ old('name') }}">
</div>



                            <div class="col-md-6">
                            <label>Email<span class="required">*</span></label>

<input type="email" name="email" class="form-control input-field" required="" value="{{old('email')}}">
                            </div>



                          <div class="col-md-6">
                          <label>Password <span class="required">*</span></label>

<input type="password" name="password" class="form-control input-field" required="" >

                          </div>


                           <div class="col-md-6">
                           <label>Re-Password <span class="required">*</span></label>

<input type="password" name="c_password" class="form-control input-field" required="">

                           </div>




                        <div class="col-md-6">
                        <label>Phone number<span class="required">*</span></label>

<input type="text" name="phone" class="form-control input-field" required="" value="{{old('phone')}}">


                        </div>


                          <div class="col-md-12">
                          <label>How did you hear about us?<span class="required">*</span></label>

<div class="inline">

    <label>

        <input type="radio" name="hear_about" value="Face book" checked="">

        Facebook

    </label>

    <label>

        <input type="radio" name="hear_about" value="Instgram">

        Instgram

    </label>



    <label>

        <input type="radio" name="hear_about" value="Snapchat">

        Snapchat

    </label>

    <label>

        <input type="radio" name="hear_about" value="Google search">

        Google search

    </label>

    <label>

        <input type="radio" name="hear_about" value="Word of mouth">

        Word of mouth

    </label>



    <label>

        <input type="radio" name="hear_about" value="Other">

        Other

{{--                                    <input id="inputother" style="border: 1px solid #ccc;" input-field" type="text" onchange="changeradioother()" />--}}

    </label>

                          </div>
                            </div>



                        </div>



                        <div class="col-md-12">
                        <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Register now</button>
                        </div>

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

@endsection