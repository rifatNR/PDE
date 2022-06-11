<!DOCTYPE html>
<html lang="en">

<head>
    @include('users.include.head')
    @yield('title')

    
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
    FB.init({
    xfbml : true,
    version : 'v10.0'
    });
    };
    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
    attribution="setup_tool"
    page_id="103800357720646"
    theme_color="#EF6603">
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    
    
    <style>
        .no-zoom:hover {
            transform: scale(1);
        }

        .no-padding {
            padding: 0px !important;
        }

        .benefit_title {
            font-size: 20px !important;
            font-weight: 800 !important;
            color: #1EA185;
            margin-bottom: 2px;
        }

        .benefit_text {
            margin-bottom: 2rem !important;
        }

        .trust {
            background-color: purple !important;
            color: white !important;
            padding: 10px !important;
            font-size: 25px !important;
            font-family: "Cooper Black", serif !important;
        }


        .filter-pest {
            filter: invert(54%) sepia(28%) saturate(4931%) hue-rotate(132deg) brightness(88%) contrast(76%);
        }

        #overlay{	
            position: fixed;
            top: 0;
            z-index: 10000;
            width: 100%;
            height:100%;
            display: none;
            background: rgba(0,0,0,0.6);
        }
        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;  
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
            100% { 
            transform: rotate(360deg); 
            }
        }
        .is-hide{
            display:none;
        }


        .error-msg {
            position: relative;
            top: -20px;
        }

        .infoTab {
            display: none !important;
        }
        /* .content-header {
            padding: 0px !important;
        } */
    
    </style>


</head>

<body>
    <!-- <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Photo Design Expert",
          "description": "aaaa",
          "alternateName": "PDE",
          "url": "http://c7fdb3f11d08.ngrok.io/",
          "logo": "http://c7fdb3f11d08.ngrok.io/assets/img/Capture.PNG"
        }
    </script> -->

    <!-- Google Tag Manager (noscript) -->
    <noscript > 
    <iframe src = "https://www.googletagmanager.com/ns.html?id=GTM-NCJGCG5"
        height = "0"
        width = "0"
        style = "display:none;visibility:hidden"> 
    </iframe>
    </noscript >
    <!--End Google Tag Manager(noscript) -->

    <!-- ======= Header ======= -->
    @include('users.include.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('content')
   <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('users.include.footer')
    <!-- End Footer -->

    <!-- spiner -->
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- end-spinner -->

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

    <!-- Vendor JS Files -->
   @include('users.include.script')
@yield('scripts')
</body>

</html>
