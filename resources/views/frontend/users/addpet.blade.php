@extends('frontend.master')
@section('content')

    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="sideMenu">
                        <a href="{{url('packages')}}" class="btn btn-default">Make appointment</a>
                        <ul>
                            <li><a href="{{url('client/my/pets')}}">My Pets</a>  </li>
                            <li><a href="{{url('client/add/pet')}}">Add Pet</a>  </li>
                            <li><a href="{{url('client/visits')}}">All Visits</a>  </li>
                            <li><a href="{{ url('client/loyalty_cards') }}">Loyalty Cards</a></li>
                            <li><a href="{{url('client/profile')}}">Edit account</a>  </li>
                            <li><a href="{{url('client/signout')}}">Logout</a>  </li>
                        </ul>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-9 col-md-9">
                    <!-- Form Starts -->

                    <!-- Contact results -->
                    <div class="addpet">
                        <div class="form-group">
                            <form method="post" action="{{url('client/addpet')}}" enctype="multipart/form-data">
                                @csrf
                                <label>Pet name:<span class="required">*</span></label>
                                <input type="text" name="name" class="form-control input-field" required="">

                                <label>Pet Image:<span class="required">*</span></label>
                                <input type="file" name="image" class="form-control input-field" >


                                <label>Pet kind:<span class="required">*</span></label>
                                <select name="category_id" id="category_id" class="form-control input-field" required>
                                    <option disabled selected value="">Choose Pet Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>

                                <label>Pet Gender:<span class="required">*</span></label>
                                <select name="gender" id="gender" class="form-control input-field" required>
                                    <option disabled selected value="">Choose Pet Age</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                <label>Pet Age:<span class="required"></span></label>
                                <input type="number" name="age" class="form-control input-field" >

                                <label>We would love to add a photo of your pet on instagram, if you are ok with that kindly provide your account
                                </label>
                                <input type="text" class="form-control" name="instagram_account">

                                <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Add Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->

        <!-- /container-fluid-->
    </section>

@endsection