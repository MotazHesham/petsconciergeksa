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

                    <!-- Form Starts -->



                    @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif



                    <form action="{{ url('client/makeappointment') }}" id="ft-form" method="POST" accept-charset="UTF-8">

                        @csrf

                        <input type="hidden" value="{{ $id }}" id="package_id" name="package_id">

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
                                <label>Any additional information we should know about your pet?
                                    <textarea name="additional_info" id="" cols="30" rows="4" placeholder="Ex: pregnant, aggressive, so On ...."></textarea>
                                </label>
                            </div>
                            <div class="two-cols">

                                <label>Size

                                    <select name="size" id="size" onchange="change_price(null)" required
                                        class="form-control input-field">

                                        <option disabled selected value="">Select Size</option>

                                        <option value="0">Small</option>

                                        <option value="1">Medium</option>

                                        <option value="2">Large</option>

                                    </select>

                                </label>

                                <label>

                                    Price

                                    <input type="number" step="0.1" readonly id="price" name="price"
                                        class="form-control input-field" required>

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

                            <div class="addonnn">



                                <div class="row">

                                    <div class="">

                                        <label>Addon</label>



                                        @foreach ($addons as $addon)
                                            <div class="row mb-10">

                                                <div class="col-xs-7">

                                                    <input name="addon_id[]" onchange="change_price(this)"
                                                        id="addOn{{ $addon->id }}" value="{{ $addon->id }}"
                                                        type="checkbox" class="checkbox">

                                                    <label for="addOn{{ $addon->id }}" aria-label="my SQL" >{{ $addon->name }}</label>

                                                </div>

                                                <div class="col-xs-5">

                                                    {{ $addon->price }}

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>





                                    <hr />

                                </div>

                            </div>

                            <p>Confirmation requested by</p>

                            <div class="inline">
                                <label>

                                    <input type="radio" name="Confirmation requested by" value="email" checked>

                                    Email

                                </label>

                            </div>

                        </fieldset>
                        <button type="submit" class="btn btn-primary">Send</button>  
                        <br>
                        <small>Additional 50 SAR to obhur</small>
                        <br>
                        <small>We do not sedate your pet </small>

                    </form>

                    <!-- Contact results -->

                    <div id="contact_results"></div>

                </div>

                <!--/col-lg-6 -->

            </div>

            <!-- /row-->

        </div>

        <!-- /container-->



        <!-- /container-fluid-->

    </section>

    <script>
        function selectTime() {

            // disable sunday
            const picker = document.getElementById('date');
            const disabled_dates = ["2024-04-10","2024-04-11","2024-04-12","2024-04-13","2024-04-14"]
            picker.addEventListener('input', function(e){
                var day = new Date(this.value).getUTCDay();
                if([7,0].includes(day)){
                    e.preventDefault();
                    this.value = '';
                    alert('Sunday Is Off');
                } 
                if (disabled_dates.includes(this.value)) {
                    e.preventDefault();
                    this.value = '';
                    alert('This Day Is Off,, Choose another date');
                }
            });

            var date = $('#date').val();

            $.ajax({ 
                url: '{{ url('client/getTime') }}/' + date, 
                type: 'get', 
                success: function(data) {  
                    $('#avTime').show() 
                    var $time = $('#time'); 
                    $time.empty() 
                    if (data.length <= 0) {  
                        $time.append('<option id="" value="">Fully Booked Choose another date</option>'); 
                        alert('The Date ' + date + ' is Fully Booked Try another Date')
                    } else { 
                        for (var i = 0; i < data.length; i++) { 
                            $time.append('<option id=' + data[i] + ' value=' + data[i] + '>' + data[i] +
                                '</option>'); 
                        }
                    } 
                }  
            });

        }
    </script>

    <script>
        function change_price(elem) {

            let size = $('#size').val();
            let package_id = $('#package_id').val(); 
            let addons = $('input[type="checkbox"].checkbox:checked').map(function() {
                return $(this).val();
            }).get();
            
            if(size){
                $.ajax({

                    url: '{{ url('client/getPackagePrice') }}',

                    type: 'post',

                    data: {
                        size:size,
                        package_id:package_id,
                        addons:addons,
                        _token: '{{ csrf_token() }}'
                    },

                    success: function(data) {  
                        $('#price').val(data);  
                    }

                });
            }else{
                alert('you must choose size first');
                $(elem).prop('checked',false)
            }

        }
    </script>
@endsection

@section('scripts') 
    <script type="text/javascript">
        $(function(){
            var dtToday = new Date();
        
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate() + 1;
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#date').attr('min', maxDate);
        });
    </script>
@endsection