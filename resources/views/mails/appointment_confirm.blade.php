<div style="background: #8080801a;">
    <div style="text-align: center;">
        <img src="{{url('/frontend/img/logo.png')}}"
            alt="">
        <h2>This is A Confirmation Email!</h2>
        <p>Here's the appointment information:</p>
    </div>

    <div style="text-align: center; width: fit-content; margin: auto;
    border: 1px solid; border-radius: 50px; background: white;padding: 2% 11%;">

        <div>
            <h3 style="text-decoration: underline;">Your information</h3>
            <div>
                <b>Name:</b> {{ $demo->customer_name }}
            </div>
            <div>
                <b>Email:</b> {{ $demo->customer_email }}
            </div>
            <div>
                <b>Phone Number:</b> {{ $demo->customer_phone }}
            </div>
            <div>
                <b>Address:</b> {{ $demo->customer_address }}
            </div>
            <div>
                <b>Date:</b> {{ $demo->appointment_date }}
            </div>
            <div>
                <b>Time:</b> {{ $demo->appointment_time }}
            </div>
        </div>

        <hr>

        <div>
            <h3 style="text-decoration: underline;">Pet information</h3>
            <div>
                <b>Name:</b> {{ $demo->pet_name }}
            </div>
            <div>
                <b>Kind:</b> {{ $demo->pet_kind }}
            </div>
            <div>
                <b>Gender:</b> {{ $demo->pet_gender }}
            </div>
            <div>
                <b>Size:</b> {{ $demo->pet_size }}
            </div>
            <div>
                <b>Age:</b> {{ $demo->pet_age }}
            </div>
        </div>

        <hr>

        <div>
            <h3 style="text-decoration: underline;">Package information</h3>
            <div>
                <b>Name:</b> {{ $demo->package_name }}
            </div>
            <div>
                <b>Price:</b> {{ $demo->package_price }}
            </div>
            <h4>Addon</h3>
                @if ($demo->addons)
                    @foreach ($demo->addons as $addon)
                        <div style="margin:10px">
                            <b>Name:</b>
                            <span
                                style="background: #00000026;padding: 4px;border-radius: 15px;">{{ $addon['name'] }}</span>
                            <b>Price:</b>
                            <span
                                style="background: #87cefa7d;padding: 4px;border-radius: 15px;">{{ $addon['price'] }}</span>
                        </div>
                    @endforeach
                @endif
        </div>

    </div>

</div>
