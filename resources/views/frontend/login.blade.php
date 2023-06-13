@extends('frontend.master')

@section('content')

      <!-- /navbar ends -->

      <!-- Section Contact -->

      <section id="contact" class="pages pages2 no-padding">

         <div class="jumbotron" data-stellar-background-ratio="0.5">

            <!-- Heading -->

          

         </div>

         <!-- container -->

         <div class="container">

            <div class="row">

             

               <!-- Contact Form -->

               <div class="res-margin res-margin2">

			   

                  <!-- Form Starts -->

                  <div class="login_form">

                      @if(Session::has('success'))

                          <p class="alert alert-success">{{ Session::get('success') }}</p>



                      @elseif(Session::has('error'))

                          <p class="alert alert-danger">{{ Session::get('error') }}</p>

                      @endif

                      <form method="post" action="{{url('storeLogin')}}" id="storeLogin">

                          @csrf

                     <div class="form-group">

                        <label>Email<span class="required">*</span></label>

                        <input type="email" name="email" class="form-control input-field" required="">

                        <label>Password <span class="required">*</span></label>

                        <input type="password" name="password" class="form-control input-field" required="">

                      <div class="form-group">

                      <label class="form-remember">

                        <input type="checkbox">Remember Me

                      </label>

                          

                            &nbsp; &nbsp; 

                          <a class="form-recovery" href="{{url('forget/password')}}">Forgot Password?</a>

                          &nbsp; &nbsp;

                          <div class="clear"></div>

        </div>

                     </div> 

                     <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Submit</button>

                        <a href="{{url('client/register')}}" class="btn btn-default">Create new account</a>

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