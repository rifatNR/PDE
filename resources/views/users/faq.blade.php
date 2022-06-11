@extends('users.layouts.master')

@section('title')
    <title>FAQ | Photo Design Expert</title>

    <style>
        .faq-list a {
            font-size: 25px !important;
        }
    </style>
@endsection
@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">

                    <ol>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        <li>FAQ</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="faq">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </div>

                <ul class="faq-list">

                    <li data-aos="fade-up" data-aos-delay="100">
                        <a data-toggle="collapse" class="" href="#faq1">Do I need to Sign in/ Log in to get started with you?
                            <i class="icofont-simple-up"></i></a>
                        <div id="faq1" class="collapse show" data-parent=".faq-list">
                            <p>
                                No. Please just submit your contact information using our Contact form or call us directly. We will get in touch with you ASAP.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Are you accepting monthly work? <i class="icofont-simple-up"></i></a>
                        <div id="faq2" class="collapse" data-parent=".faq-list">
                            <p class="text-justify">
                                Yes, we are accepting a regular basis work. We will give you a special discount on the price and you will pay us monthly. On monthly payment, we take payment on our PayPal account or you can pay us on our Bank account also.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <a data-toggle="collapse" href="#faq3" class="collapsed">What kind of images do you edit?<i class="icofont-simple-up"></i></a>
                        <div id="faq3" class="collapse" data-parent=".faq-list">
                            <p class="text-justify">
                                We provide the best quality photo editing for all kinds of images.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Can I see how much my work has done?<i class="icofont-simple-up"></i></a>
                        <div id="faq4" class="collapse" data-parent=".faq-list">
                            <p class="text-justify">
                                Obviously, you can monitor your work. It is helpful for your time management.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="500">
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Will you give any security for the images?<i class="icofont-simple-up"></i></a>
                        <div id="faq5" class="collapse" data-parent=".faq-list">
                            <p class="text-justify">
                                Yes, Of course, your image is secure for us that these will not share with anyone.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="600">
                        <a data-toggle="collapse" href="#faq6" class="collapsed">How can I send my images for processing?<i class="icofont-simple-up"></i></a>
                        <div id="faq6" class="collapse" data-parent=".faq-list">
                            <p class="text-justify">
                                You can send an image via our web upload service or FTP for uploading & downloading and also can send via the Attached file, Google Drive, Wetransfer, Dropbox or other alternatives.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>
    </main>

@endsection
