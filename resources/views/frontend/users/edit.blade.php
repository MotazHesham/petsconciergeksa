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

                    @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>

                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif

                    <form action="{{url('client/updateuser')}}" id="ft-form" method="POST" accept-charset="UTF-8">
                        @csrf
                        <!-- Form Starts -->
                        <fieldset>

                            <div class="two-cols">
                                <label>
                                    Name
                                    <input type="text" name="name" value="{{$user->name}}" required class="form-control input-field" required>
                                </label>
                                <label>
                                    Phone number
                                    <input type="tel" name="phone" value="{{$user->phone}}" required class="form-control input-field">
                                </label>
                            </div>

                            <div class="two-cols">
                                <label>
                                    Email address
                                    <input type="email" name="email" value="{{$user->email}}" required class="form-control input-field" required>
                                </label>
                                <label>
                                    Password
                                    <input type="text" name="password"  class="form-control input-field">
                                </label>
                            </div>

{{--                            <div class="two-cols">--}}
{{--                                <label>--}}
{{--                                    Cites--}}
{{--                                    <select name="city_id" class="form-control input-field">--}}
{{--                                        @foreach($cities as $city)--}}
{{--                                            <option value="{{$city->id}}"--}}
{{--                                                    @if($user->city_id == $city->id) selected @endif--}}
{{--                                            >{{$city->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </label>--}}
{{--                                <label>--}}
{{--                                    Address--}}
{{--                                    <input type="text" name="address" value="{{$user->address}}" required class="form-control input-field">--}}
{{--                                </label>--}}
{{--                            </div>--}}
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 mb-0">
                                <div class="form-group modal-body">
                                    <label></label>
                                    <input type="hidden" name="lat" id="lat" value="{{$user->lat ?? '24.774265'}}">
                                    <input type="hidden" name="lng" id="lng" value="{{$user->lng ?? '46.738586'}}">
                                    <input type="hidden"  name="address" id="address" value="{{$user->address ?? ''}}">

                                    <div id="googleMap" style="width:100%; height:500px;"></div>
                                </div>

                            </div>
                        </fieldset>
                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
                    </form>
                    <!-- Contact results -->
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->

        <!-- /container-fluid-->
    </section>
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgT7WlFOpeuez5qKBL-yDXkuRpCUol0Rg&libraries=places&callback=initAutocomplete"
            async defer>

    </script>

    <script type="text/javascript">
        var geocoder = new google.maps.Geocoder;

        function addYourLocationButton (map,marker)
        {
            var controlDiv = document.createElement('div');

            var firstChild = document.createElement('button');
            firstChild.style.backgroundColor = '#fff';
            firstChild.style.border = 'none';
            firstChild.style.outline = 'none';
            firstChild.style.width = '28px';
            firstChild.style.height = '28px';
            firstChild.style.borderRadius = '2px';
            firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
            firstChild.style.cursor = 'pointer';
            firstChild.style.marginRight = '10px';
            firstChild.style.padding = '0';
            firstChild.title = 'Your Location';
            $(firstChild).on("click",function(e){
                e.preventDefault();
            });
            controlDiv.appendChild(firstChild);

            var secondChild = document.createElement('div');
            secondChild.style.margin = '5px';
            secondChild.style.width = '48px';
            secondChild.style.height = '78px';
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-2x.png)';
            secondChild.style.backgroundSize = '180px 18px';
            secondChild.style.backgroundPosition = '0 0';
            secondChild.style.backgroundRepeat = 'no-repeat';
            firstChild.appendChild(secondChild);

            google.maps.event.addListener(map, 'center_changed', function () {
                secondChild.style['background-position'] = '0 0';
            });

            firstChild.addEventListener('click', function () {
                var imgX = '0',
                    animationInterval = setInterval(function () {
                        imgX = imgX === '-18' ? '0' : '-18';
                        secondChild.style['background-position'] = imgX+'px 0';
                    }, 500);

                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        console.log(position);
                        $('#lat').attr('value',position.coords.latitude);
                        $('#long').attr('value',position.coords.longitude);
                        map.setCenter(latlng);
                        var geocoder = new google.maps.Geocoder;

                        geocoder.geocode({'location': latlng}, function(results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    console.log(results[0].formatted_address);
                                    $('#pac-input').val(results[0].formatted_address);
                                    $("#address").val(results[0].formatted_address);

                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                        if(myMarker!=null)
                            myMarker.setMap(null);
                        myMarker = new google.maps.Marker({
                            map: map,
                            animation: google.maps.Animation.DROP,
                            position: latlng
                        });





                        clearInterval(animationInterval);
                        secondChild.style['background-position'] = '-144px 0';
                    });

                } else {
                    clearInterval(animationInterval);
                    secondChild.style['background-position'] = '0 0';
                }





            });

            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
        }
    </script>
    <script>
        function GetLatlong( add) {
            var geocoder = new google.maps.Geocoder();
            var address = add;
            if(myMarker!=null)
                myMarker.setMap(null);

            geocoder.geocode({'address': address}, function (results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#latt').attr('value',latitude);
                    $('#long').attr('value',longitude);
                    var latlng = new google.maps.LatLng(latitude, longitude);

                    map.setCenter(latlng);
                    myMarker = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: latlng
                    });

                }
            });

        }
        $('#add').keyup(function(){
            var query = $(this).val();
            if(query.length >=3)
            {
                GetLatlong(query);


            }

        });
    </script>

    <script>
        var myMarker;
        function initAutocomplete() {

            var map = new google.maps.Map(document.getElementById('googleMap'), {
                @if($user->lat && $user->lng)
                center: {lat: {{$user->lat}} , lng: {{$user->lng}}},
                @else
                center: {lat:24.774265 , lng:46.738586},
                @endif
                zoom: 15,
                mapTypeId: 'roadmap',
                disableDefaultUI: true

            });
            myMarker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                @if($user->lat && $user->lng)
                position: {lat: {{$user->lat}} , lng: {{$user->lng}}},
                @else
                position: {lat: 24.774265 , lng: 46.738586 }
                @endif
            });
            addYourLocationButton(map, myMarker);

            var input = document.getElementById('pac-input');
            if(input === null){
                $(".modal-body").append("<input id=\"pac-input\" onPaste=\"\" required value='{{$user->address ?? ''}}' onkeydown=\"if (event.keyCode == 13) {return false;}\"\n" +
                    "                           class=\"controls form-control\" type=\"text\" placeholder=\"Kindly Write your Address\" style=\"position: absolute;\n" +
                    "    z-index: 0;\n" +
                    "    right: 20px;\n" +
                    "    top: 40px;\n" +
                    "    width: 50%;\">");

                var input = document.getElementById('pac-input');

            }

            console.log(input);
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];

            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }


                    markers.push(new google.maps.Marker({
                            map: map,
                            title: place.name,
                            position: place.geometry.location,
                            draggable: true
                        })
                    );




                    var last_marker = markers[markers.length - 1];
                    console.log(last_marker.map.center.lat());
                    console.log(last_marker.map.center.lng());
                    document.getElementById('lat').value = markers[0].position.lat();
                    document.getElementById('lng').value = markers[0].position.lng();

                    $("#lat").val(markers[0].position.lat());
                    $("#lng").val(markers[0].position.lng());
                    var x=$('#pac-input').val();
                    console.log(x);
                    $("#address").val(x);
                    console.log($("#lat").val());
                    console.log(markers[0].position.lat());
                    google.maps.event.addListener(last_marker, 'dragend', function (event) {
                        $("#lat").val(event.latLng.lat());
                        $("#lng").val(event.latLng.lng());

                        document.getElementById('lat').value = event.latLng.lat();
                        document.getElementById('lng').value = event.latLng.lng();
                    });


                    if (place.geometry.viewport) {

                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }


                });
                map.fitBounds(bounds);
            });

            $('#pac-input').css('top','20 px');

        }
    </script>
@endsection