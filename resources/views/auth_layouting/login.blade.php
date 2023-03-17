<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/bootsrap.min.css">





    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/animate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/main.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .login100-form-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-align: left
        }

        .login100-form-btn {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            border-radius: 30px;
        }

        .login100-form {
            width: 560px;
            min-height: 100vh;
            display: block;
            background-color: #F8F8F8;
            padding: 70px 55px 55px;
        }

        .form-input {
            border-radius: 30px;
            padding: 15px;
            padding-left: 30px;
            font-size: 14px;

        }

        .form-input:focus {

            border: 1px solid #435EBE !important;

        }

        .btn-primary {
            background-color: #435EBE;
        }

        @media (max-width: 992px) {
            .login100-form {
                width: 100% !important;
                padding-left: 30px;
                padding-right: 30px;
            }
        }
    </style>


    <meta name="robots" content="noindex, follow">
    <script nonce="80f0ffa4-0239-40e0-9967-363677b3eb7e">
        (function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);
    </script>
</head>

<body style="background-color: #666666;">
    <div class="limiter">

        <div class="container-login100">

            <div class="wrap-login100">
                <div class="login100-more" style="background-image: url({{'/img/login_takemori.jpg'}});">
                </div>
                <form class="login100-form validate-form" action="{{ route('login') }}" method="post">

                    <img src="/img/Takemori.svg" alt="" width="80px" class="mb-5">

                    @csrf
                    <span class="login100-form-title p-b-43">
                        Sign In
                    </span>
                    <center>
                        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    </center>

                    <div class="form-group">
                        <label for="" class="text-secondary mb-2">Username</label>
                        <input class="form-control form-input" name="username" type="text" name="username"
                            :value="old(' username')" required>

                    </div>
                    <div class="form-group">
                        <label for="" class="text-secondary mb-2">Password</label>
                        <input class="form-control form-input" type="password" name="password" required
                            autocomplete="current-password">

                    </div>

                    <div>

                    </div>
                    <div class="container-login100-form-btn mt-4">
                        <button class="login100-form-btn btn-primary" type="submit">
                            <i class="bi bi-box-arrow-in-right" style="font-size: 1.5rem;"></i> &nbsp; Sign In
                        </button>

                    </div>

                </form>


            </div>
        </div>
    </div>



</body>


</html>