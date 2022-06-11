@extends('users.layouts.master')

@section('title')
    <title>All TimeZone | Photo Design Expert</title>

    <style>
        .time-zone {
            padding-top: 20px !important;
        }

        .head {
            font-weight: 700 !important;
            font-size: 30px !important;
        }
    </style>
@endsection
@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>TimeZone</h2>
                    <ol>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page2 time-zone">
            <div class="container-fullwidth">
                {{--          <img src="{{ asset('assets/img/background/meeting-1020145_1920.jpg')}}" width="100%" alt="">--}}
                <div class="container">
                    <div class="text-center">
                        <h2 class="head">TimeZone</h2>
                    </div>
                    <br>
                    <div class="clock-all">
                        <div class="container d-flex flex-column">
                            <div class="row text-center">
                                <div class="col-md-3">
                                    <div id="bd"></div>
                                    <p class="bascolor">Bangladesh</p>
                                    <b><p id="timeInBd"></p></b>
                                </div>
                                <div class="col-md-3">
                                    <div id="myclock"></div>
                                    <p class="bascolor">UK</p>
                                    <b><p id="timeInUK"></p></b>
                                </div>
                                <div class="col-md-3">
                                    <div id="am"></div>
                                    <p class="bascolor">Italy</p>
                                    <b><p id="timeInItaly"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="usa"></div>
                                    <p class="bascolor">USA</p>
                                    <b><p id="timeInUSA"></p></b>
                                </div>
                            </div>

                            <div class="mt-4 row text-center">
                                <div class="col-md-3">
                                    <div id="Russia"></div>
                                    <p class="bascolor">Russia</p>
                                    <b><p id="timeInRussia"></p></b>
                                </div>
                                <div class="col-md-3">
                                    <div id="Grumany"></div>
                                    <p class="bascolor">Germany</p>
                                    <b><p id="timeInGrumany"></p></b>
                                </div>
                                <div class="col-md-3">
                                    <div id="sweden"></div>
                                    <p class="bascolor">Sweden</p>
                                    <b><p id="timeInsweden"></p></b>
                                </div>
                                <div class="col-md-3">
                                    <div id="brazil"></div>
                                    <p class="bascolor">brazil</p>
                                    <b><p id="timeInbrazil"></p></b>
                                </div>
                            </div>

                            <div class="mt-4 row text-center">
                                <div class="col-md-3">
                                    <div id="canada"></div>
                                    <p class="bascolor">Canada</p>
                                    <b><p id="timeIncanada"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="australia"></div>
                                    <p class="bascolor">Australia</p>
                                    <b><p id="timeInaustralia"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="french"></div>
                                    <p class="bascolor">French</p>
                                    <b><p id="timeInfrench"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="spain"></div>
                                    <p class="bascolor">Spain</p>
                                    <b><p id="timeInspain"></p></b>
                                </div>
                            </div>

                            <div class="mt-4 row text-center">
                                <div class="col-md-3">
                                    <div id="mexico"></div>
                                    <p class="bascolor">Mexico</p>
                                    <b><p id="timeInmexico"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="Turkey"></div>
                                    <p class="bascolor">Turkey</p>
                                    <b><p id="timeInTurkey"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="SouthAfrica"></div>
                                    <p class="bascolor">South Africa</p>
                                    <b><p id="timeInSouthAfrica"></p></b>
                                </div>

                                <div class="col-md-3">
                                    <div id="portugal"></div>
                                    <p class="bascolor">Portugal</p>
                                    <b><p id="timeInSouthPortugal"></p></b>
                                </div>
                            </div>


                        </div>

                </div>
            </div>
        </section>

    </main>

@endsection
