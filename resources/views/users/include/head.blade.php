<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="title" content="Photo Design Expert Is Bulk Image Editing Company">
  <meta name="description" content="Photo Design Expert provides Professional Photo Editing Services with a bulk option for photographers.">
  <meta name="keywords" content="photo design expert, photodesignexpert, design expert, clipping path, remove background, shadow creation, image retouching, image masking, photo manipulation, photo color creation">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="google-site-verification" content="b6GeYSrG8JJTnniW_KYX2BvLFhKtkX0zwuxYF0pPhzE" />

    @yield('meta')

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png?v=2')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
{{--  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
{{--<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">--}}

{{--  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">--}}
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
{{--  <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />
{{--  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">--}}
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
{{--  <link href="{{ asset('assets/vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" />
{{--  <link href="{{ asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.2/venobox.min.css" integrity="sha512-e+0yqAgUQFoRrJ4pZigQXpOE0S7J9IGwmgH801h4H5ODqOCG8/GRfXHQ+9ab754NL79O7wDwdjwY3CcU8sEANg==" crossorigin="anonymous" />
{{--  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
{{--  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />
{{--<link href="{{ asset('assets/css/cocoen.min.css')}}" rel="stylesheet">--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{ asset('assets/css/font-pro.css')}}" rel="stylesheet">
{{--<link rel="stylesheet" href="{{ asset('assets/css/twentytwenty.css')}}" >--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/css/twentytwenty.min.css" integrity="sha512-NJy06C7fPArp8I0XLO5pDDTDguBMLCPQ2FyjU3xrwuD5CGyN6CbfTr40Zv+YON7lDNzAsRqZeEY8Oi0xrgP+3w==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('assets/css/swapimagesonhover.css')}}" >
<script rel="text/javascript" src="{{ asset('assets/js/swapimagesonhover.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js" integrity="sha512-KgeSi6qqjyihUcmxFn9Cwf8dehAB8FFZyl+2ijFEPyWu4ZM8ZOQ80c2so59rIdkkgsVsuTnlffjfgkiwDThewQ==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" />
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>--}}
{{--<link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/min/dropzone.min.css')}}">--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js"></script>

{!! NoCaptcha::renderJs() !!}


{{--<script rel="text/javascript" src="{{ asset('assets/js/jquery.event.move.js') }}"></script>--}}
{{--<script rel="text/javascript" src="{{ asset('assets/js/jquery.twentytwenty.js') }}"></script>--}}



@php
$tags = \App\HeaderTags::where('is_active', 1)->get(); 
@endphp

@foreach($tags as $tag)
{!! $tag->content !!}
@endforeach




<script data-ad-client="ca-pub-6007323338487214" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<link rel="stylesheet" href="{{ asset('user_side.css') }}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- =======================================================
  * Template Name: Selecao - v2.3.0
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

<style>
  .filter-orange {
    transition: 0.3s;
    filter: invert(41%) sepia(58%) saturate(2351%) hue-rotate(3deg) brightness(98%) contrast(98%);
  }

  .filter-white {
    filter: invert(100%) sepia(0%) saturate(2%) hue-rotate(131deg) brightness(102%) contrast(101%) !important;
  }
</style>
