@extends('frontend.master')

@section('content')

      <!-- /navbar ends -->

      <!-- Section Contact -->

      <section id="contact" class="pages no-padding">

         <div class="jumbotron" data-stellar-background-ratio="0.5"   style="background: url({{URL::asset('storage/app/public/attachment/' . $aboutus->image_contact)}});">

            <!-- Heading -->

        

         </div>

         <!-- container -->

         <div class="container">

            <div class="row">

               <!-- Contact Info -->

               <div class="col-lg-5 col-md-5">

                     <h3>Information </h3>

                     <ul class="list-inline">

                        <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">{{ $aboutus->email}}</a></li>

                         

                         <br />

                        <li><i class="fa fa-phone margin-icon"></i>{{ $aboutus->email }}</li>

                         <br />

                        <li><i class="fa fa-map-marker margin-icon"></i>{{ $aboutus->address }}</li>

                     </ul>

                     <!-- address info -->

                                

               </div>

               <!-- /col-lg-5-->

               <!-- Contact Form -->

               <div class="col-lg-6 col-md-6 col-lg-offset-1 col-md-offset-1 res-margin">

			     <h3>Write us</h3>

                  <!-- Form Starts -->

                  <div id="contact_form">

                     <form method="post" action="{{url('storeContact')}}">

                        @csrf

                     <div class="form-group">

                        <label>Name<span class="required">*</span></label>

                        <input type="text" name="name" class="form-control input-field" required="">                    

                        <label>Email Adress <span class="required">*</span></label>

                        <input type="email" name="email" class="form-control input-field" required="">           

                        <label>Subject</label>

                        <input type="text" name="subject" class="form-control input-field" required="">                            

                        <label>Message<span class="required">*</span></label>

                        <textarea name="message" id="message" class="textarea-field form-control" rows="3"  required=""></textarea>

                     </div>

                     <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Send message</button>

                     </form>

                  </div>

                  <!-- Contact results -->

                  <div id="contact_results"></div>

               </div>

               <!--/col-lg-6 -->             

            </div>

            <!-- /row-->

         </div>

         <!-- /container-->

         <div class="container-fluid margin1">

            <!-- map-->

            <div id="map-canvas"></div>

         </div>

         <!-- /container-fluid-->

      </section>

      <!-- /Section ends -->

      <!-- Footer -->		

       <!-- Footer -->		

@endsection