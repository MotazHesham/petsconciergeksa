@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">



            <form action="{{ route('admin.appointment.update',$appointment->id) }}" id="ft-form" method="POST" accept-charset="UTF-8">

                @csrf

                <div class="form-group">
                    <label class="required">Package</label>
                    <select name="package_id" id="package_id" class="form-control" onchange="change_price(null)" required> 
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}" @if($package->id == $appointment->package_id) selected @endif>{{ $package->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required">Client</label>
                        <select name="client_id" id="client_id" required class="form-control input-field select2" onchange="get_pets()" required>
                            <option value="">Choose Client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" @if($client->id == $appointment->user_id) selected @endif>{{ $client->name }} ({{ $client->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required">Pet</label>

                        <select name="pet_id" id="pet_id" required class="form-control input-field" required>
                            <option value="">Choose pet</option>
                            @foreach ($pets as $pet)
                                <option value="{{ $pet->id }}" @if($pet->id == $appointment->pet_id) selected @endif>{{ $pet->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Any additional information we should know about your pet?
                    </label>
                    <textarea name="additional_info" class="form-control" id="" cols="30" rows="4"
                        placeholder="Ex: pregnant, aggressive, so On ....">{{ $appointment->additional_info }}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required">Size</label>

                        <select name="size" id="size" onchange="change_price(null)" required
                            class="form-control input-field"> 

                            <option value="0" @if($appointment->size == 'Small') selected @endif>Small</option>

                            <option value="1" @if($appointment->size == 'Medium') selected @endif>Medium</option>

                            <option value="2" @if($appointment->size == 'Large') selected @endif>Large</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Price</label>

                        <input type="number" step="0.1" readonly id="price" name="price"
                            class="form-control input-field" value="{{ $appointment->price }}" required>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required">
                            Date
                        </label> 
                        <input type="date" onchange="selectTime()" id="date" name="date" value="{{ $appointment->date }}"
                            class="form-control input-field" required>

                    </div>
                    <div class="form-group col-md-6"  id="avTime" >
                        <label class="required">
                            Time
                        </label>

                        <select required name="time" id="time" class="form-control input-field"> 

                        </select>
                    </div>
                </div>




                <div class="form-group">  
                    <label>Addon</label> 
                    @foreach ($addons as $addon)
                        <div class="row"> 
                            <div class="col-md-4"> 
                                <input name="addon_id[]" onchange="change_price(this)" id="addOn{{ $addon->id }}"
                                    value="{{ $addon->id }}" type="checkbox" class="checkbox"  @if($appointment->addon_id && in_array($addon->id,json_decode($appointment->addon_id))) checked @endif> 
                                <label for="addOn{{ $addon->id }}"
                                    aria-label="my SQL">{{ $addon->name }}</label> 
                            </div> 
                            <div class="col-md-8"> 
                                {{ $addon->price }} 
                            </div> 
                        </div>
                    @endforeach   
                </div>  
                <button type="submit" class="btn btn-primary">Send</button>  
            </form>
        </div>
    </div>

    <script>
        function get_pets(){
            let client_id = $('#client_id').val();
            $.ajax({ 
                url: '{{ url('admin/getPets') }}', 
                type: 'post', 
                data: { 
                    client_id: client_id, 
                    _token: '{{ csrf_token() }}'
                }, 
                success: function(data) {
                    $('#pet_id').html(null);

                    for (var i = 0; i < data.length; i++) {
                        $('#pet_id').append($('<option>', {
                            value: data[i].id,
                            text: data[i].name
                        }));
                    }
                } 
            });
        }
        function selectTime() {

            // disable sunday
            const picker = document.getElementById('date');
            picker.addEventListener('input', function(e) {
                var day = new Date(this.value).getUTCDay();
                if ([7, 0].includes(day)) {
                    e.preventDefault();
                    this.value = '';
                    alert('Sunday Is Off');
                }
            });

            var date = $('#date').val();

            $.ajax({ 
                url: '{{ url('client/getTime') }}/' + date, 
                data:{
                    appointment_id:'{{$appointment->id}}'
                },
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
                            var selected = '';
                            if(data[i] == '{{ $appointment->time }}'){
                                selected = 'selected';
                            }
                            $time.append('<option id=' + data[i] + ' value=' + data[i] + ' '+selected+'>' + data[i] +
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

            
            if (size) {
                $.ajax({ 
                    url: '{{ url('client/getPackagePrice') }}', 
                    type: 'post', 
                    data: {
                        size: size,
                        package_id: package_id,
                        addons: addons,
                        _token: '{{ csrf_token() }}'
                    }, 
                    success: function(data) {
                        $('#price').val(data);
                    } 
                });
            } else {
                alert('you must choose size first');
                $(elem).prop('checked', false)
            }

        }
    </script>
@endsection
 