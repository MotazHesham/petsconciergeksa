@extends('frontend.master')
@section('content')
    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->

        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book The Loyalty card Now</h5> 
                    </div>
                <div class="modal-body">



                    <form action="{{ url('client/bookloyalty') }}" id="ft-form" method="POST" accept-charset="UTF-8">

                        @csrf

                        <input type="hidden" value="{{ $aboutus->package_loyalty }}" id="package_id" name="package_id">

                        <fieldset>

                            <div class="">

                                <label>Pet name</label>

                                <select name="pet_id" id="pet_id" required class="form-control input-field">

                                    @foreach ($pets as $pet)
                                        <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="two-cols">

                                <label>Size

                                    <select name="size" id="size" required
                                        class="form-control input-field">

                                        <option disabled selected value="">Select Size</option>

                                        <option value="0">Small</option>

                                        <option value="1">Medium</option>

                                        <option value="2">Large</option>

                                    </select>

                                </label> 

                            </div>



                            <div class="two-cols">

                                <label>

                                    Date

                                    <input type="date" onchange="selectTime()" id="date" name="date"
                                        class="form-control input-field" required>

                                </label>

                                <label id="avTime" style="display: none">

                                    Time

                                    <select required name="time" id="time" class="form-control input-field">



                                    </select>

                                </label>



                            </div> 

                            <p>Confirmation requested by</p>

                            <div class="inline">

                                <label>

                                    <input type="radio" name="Confirmation requested by" value="email" checked>

                                    Email

                                </label>

                            </div>

                        </fieldset> 

                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary g-recaptcha" 
                                data-sitekey="reCAPTCHA_site_key" 
                                data-callback='onSubmit' 
                                data-action='submit'>Send

                        </button>

                    </form>

                </div> 
            </div>
            </div>
        </div>
        <!-- container -->
        <div class="container">
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @elseif(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="sideMenu">
                        <a href="{{ url('packages') }}" class="btn btn-default">Make appointment</a>
                        <ul>
                            <li><a href="{{ url('client/my/pets') }}">My Pets</a></li>
                            <li><a href="{{ url('client/add/pet') }}">Add Pet</a></li>
                            <li><a href="{{ url('client/visits') }}">All Visits</a></li>
                            <li><a href="{{ url('client/loyalty_cards') }}">Loyalty Cards</a></li>
                            <li><a href="{{ url('client/profile') }}">Edit account</a></li>
                            <li><a href="{{ url('client/signout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-9 col-md-9">
                    @if($have_loyalty_card)
                        <div style="text-align: center;margin:20px">
                            <b style="color:green">CONGRATS !! You Have a New Loyalty Card ...</b>
                            <br>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">Book Now</a>
                        </div>
                    @endif
                    <!-- Form Starts -->
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Pet name</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>
                                        <a href="{{ url('client/petDetails', $appointment->pet->id) }}">
                                            {{ $appointment->pet->name ?? '' }}
                                        </a>
                                    </td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->price }}</td>
                                    <td>{{ $appointment->package->name ?? '' }}</td>

                                    <td>
                                        @if ($appointment->status == 0)
                                            {{ trans('cruds.appointment.fields.active') }}
                                        @elseif($appointment->status == 1)
                                            {{ trans('cruds.appointment.fields.assigned') }}
                                        @else
                                            {{ trans('cruds.appointment.fields.done') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($appointment->status == 2 && !$appointment->comment()->first())
                                            <button type="button" class="btn btn-primary"
                                                onclick="setID({{ $appointment->id }})"
                                                data-target-id="{{ $appointment->id }}" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Comment
                                            </button>
                                        @else
                                            {{ $appointment->comment()->first()->comment ?? '' }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $appointments->links() }}

                    <!-- Contact results -->
                    <div id="contact_results"></div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->

        <!-- /container-fluid-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ url('client/storeComment') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>

                            <input type="hidden" id="appointment_id" name="appointment_id">
                            <textarea name="comment" class="form-control input-field" required></textarea>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            function setID(id) {
                $('#appointment_id').val(id); 
            }
        </script>
        
    <script>
        function selectTime() {

            var date = $('#date').val();

            $.ajax({

                url: '{{ url('client/getTime') }}/' + date,

                type: 'get',

                success: function(data) {

                    if (data.length <= 0) {

                        $('#time').empty();

                        $('#avTime').hide();

                    } else {

                        $('#avTime').show()

                        var $time = $('#time');

                        $time.empty()

                        for (var i = 0; i < data.length; i++) {

                            $time.append('<option id=' + data[i] + ' value=' + data[i] + '>' + data[i] +
                                '</option>');

                        }

                    }

                }

            });

        }
    </script>

    </section>
@endsection
