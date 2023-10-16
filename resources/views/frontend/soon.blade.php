<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">




    <title>PETS</title>


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <style>
        a {
            color: #fff;
        }

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            text-align: center;
            background-image: url('{{ asset("public/frontend/img/main_bg.jpg")}}');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Open Sans Condensed', sans-serif;
        }

        .overlay {
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background: rgba(35, 196, 222, .3)
        }

        .content {
            width: 75%;
            position: relative;
            margin: 7% auto;
            padding: 8px;



        }

        .content h1 {
            font-size: 3em;
            color: #fff;
            letter-spacing: 3px;
            padding: 25px 0px;
            text-transform: uppercase;
            text-shadow: 1px 1px 1px #fff, 1px 1px 1px white;
        }

        .content .input-group {
            margin: 0 auto;
            width: 75%;
        }

        .content p {
            color: #fff;
            line-height: 30px;
            padding-bottom: 12px;
        }

        @media (max-width: 450px) {
            .content h1 {
                letter-spacing: 2px;
                font-size: 25px;
            }

            .content .input-group {
                margin: 0 auto;
                width: 100%;
            }

            h3 {
                font-size: 15px;
            }
        }

        .content ul.social {
            margin-top: 45px;
        }

        .content li a {
            color: #fff;
            margin: 2%;
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



</head>

<body translate="no">
    <div class="overlay"></div>
    <div class="wrap  ">
        <div class="content ">


            @php
            $aboutus = \App\Models\AboutUs::first();
        @endphp
            <img src="{{ URL::asset('storage/app/public/attachment/' . $aboutus->logo) }}" />

            <p style=" font-size:20px; font-weight:bold;">
                Pets Concierge KSA
            </p>
            <h1>
                We are
                <br /><span style="color: #337ab7; text-shadow: 1px 1px 1px #fff, 1px 1px 1px white; color:#fff; ">
                    Coming ..... Soon</span>
            </h1>
            <p>
                Be the first to know when we launch.

            </p>

            <h3>
                <a href="mailto:info@petsconciergeksa.com">info@petsconciergeksa.com</a>
            </h3>

            <!-------------------
                <ul class="social list-inline">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-codepen"></i></a></li>
                </ul>
    -------->
        </div>
        <!-- END #CONTENT -->

    </div>


</body>

</html>
