@extends('users.layouts.master')

@section('title')
    <title>About | Photo Design Expert</title>
@endsection
@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About Us</h2>
                    <ol>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container-fullwidth">
                {{--          <img src="{{ asset('assets/img/background/meeting-1020145_1920.jpg')}}" width="100%" alt="">--}}
                <div class="container-fullwidth">
                    <div class="text-center">
                        <h2 class="mt-md-0 mt-3">About Us</h2>
                    </div>
                    <div class="about-inner-two pt-3 pb-3 mb-md-5 mb-3 mt-md-5 mt-3">
                        <div class="container">
                            <p class="text-justify about-us-blue">
                                Photo Design Expert believes first in serving the customer and high-quality product. We
                                want to make a good place for this type of work by faster, high quality and professionally
                                edited images. So Photo Design Expert uses not only the latest & cutting edge software and
                                technologies but also an IT infrastructure to ensure ease of operations for the clients. Our
                                facilities ensure all kind of Photographer and Company need our Professional Photo Editing
                                Services without hassles.
                            </p>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-pera p-4 mb-md-0 mb-3">
                            <p class="text-justify">
                                Technology-depend people's services are more spreading worldwide and pictures will be
                                the most important here. When you look at the picture that you will understand the
                                picture’s language. Many online Business organizations/companies are not getting a
                                perfect photo editing source. A perfect editor is very crucial. From this idea, the
                                founder Mr. James thought and decides to take it as a business. Since it is a long-term
                                & expansion type of business. So he began as a small & locally at Dhaka in Bangladesh
                                2010 with his younger brother CEO Jupiter. Pictures expression is essential for the
                                attraction of customers. For this type of image editing, we have a professional and
                                skilled expert Designer. We serve 24 hours a week. We provide all kinds of photo editing
                                services at an affordable price with a fixed period. We committed to spreading the
                                benefits of the technology through cheapest and high-quality image editing whole over
                                the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Team</h2>
                    <p>Our Hardworking Team</p>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/team/James (Founder & chairman).jpg') }}"
                                     class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>James</h4>
                                <span>Founder & chairman</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/team/Jupiter (Chief Executive officer).jpg') }}"
                                     class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Hadiur Rahman</h4>
                                <span>Chief Executive officer</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/team/Swajan (Head of IT).jpg') }}" class="img-fluid"
                                     alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Swajan</h4>
                                <span>Head of IT</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/team/team_trita.png') }}"
                                     class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Trita</h4>
                                <span>Head of Production & QC</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section
    </main>

@endsection
