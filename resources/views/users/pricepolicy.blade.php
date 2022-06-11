@extends('users.layouts.master')

@section('title')
    <title>Price Policy | Photo Design Expert</title>
@endsection
@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bolder">Price Policy</h2>
                    <ol>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        <li>Privacy</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container-fullwidth">
                {{--          <img src="{{ asset('assets/img/background/meeting-1020145_1920.jpg')}}" width="100%" alt="">--}}
                <div class="container-fullwidth">

                    <div class="container  pt-3 pb-3 mb-3 mt-1">
                        <div class="container text-center">
                            <h2 class="text-danger font-weight-bold">PHOTO EDITING SERVICE PRICING</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-pera p-4">
                            <p class="text-justify">
                                This is our price list for all the services which we provide. If you were trying to find a skilled and professional photo editing service for a very cheap price, you found the right place. The prices for image editing services from fix the photo firm are reasonable and stable since 2013. Do not forget to say all instructions, extra changes to the pictures that should be fixed. You purchase the services by American dollars however we will accept international charges via PayPal.
                            </p>
                            <p>
                                A large number of photographers refer to various online image editing services to simplify their work and get more profit. Our company provides totally different editing packages. Each of them consists of various Photoshop techniques.
                            </p>
                            <p>
                                A UK-based experienced company has gathered a large team of profs, image manipulators who gather more than ten years of working experience in this business, understand Photoshop & Light room from A to Z, know how to process images of all types and from various genres: portrait photos, family reunion and day of remembrance photo sessions, wedding photos, e-commerce product photos, magazine and fashion photos, etc.
                            </p>
                        </div>
                    </div>
                    <div class="container  pt-3 pb-3 mb-3 mt-3">
                        <div class="container text-center">
                            <h2 class="text-danger font-weight-bold">Pricing for freelancer</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-pera p-4">
                            <p class="text-justify">
                                Freelance photo editing price depends on the photo editing requirements. The right price of the image editing services you use will change greatly, depending on the vendor/contractor, the complexity of the editing, volume of images and how quickly you need the edited photos back.
                                <br>
                                <br>
                                Freelance photo editing price list will have an effect on its turnaround time. We have also capable of handling photos on an urgent basis.
                                <br>
                                <br>
                                For getting an idea about our costs you can check our photo editing price list.
                            </p>
                        </div>
                    </div>
                    <div class="container  pt-3 pb-3 mb-3 mt-3">
                        <div class="container text-center">
                            <h2 class="text-danger font-weight-bold">Pricing for other options</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-pera p-4">
                            <p class="text-justify">
                                Even more, we've another choice able option as well while setting up the image editing pricing. After all, you are a client and want to customize your orders, you are always welcome.
                                <br><br>
                                You may pay us using the photos you want to edit.
                                <br><br>
                                #    When the numbers of photos will at least 100 or more images, you will get a flat discount. But when the numbers of photos will below 100, you will pay us the regular price.
                                <br><br>
                                #   Besides, we will take charge based on hourly prices. When you query us to meet your emergencies, you will need to pay is hourly. The price is $79.00 USD per hour. The price might seem higher, but when you compare the photo edits, you will able to differentiate that the rate is lower.
                                <br><br>
                                #   On another part, we will also capable to edit photos by day that similar to hourly editing. The image editing evaluation on a daily basis is the subject of mutual negotiation.
                            </p>
                        </div>
                    </div>
                    <div class="container  pt-3 pb-3 mb-3 mt-3">
                        <div class="container text-center">
                            <h2 class="text-danger font-weight-bold">Turnaround Time</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="about-pera p-4">
                            <p class="text-justify">
                                In Photo Design Expert, Our professional and skilled designer reaches a satisfactory combination of quality, cheap photo editing and amazing with turnaround time. Our turnaround times are
                                <br><br>
                                1-6 hours;
                                <br>
                                12 hours;
                                <br>
                                24 hours;
                                <br>
                                and 36 hours.
                                <br><br>
                                To make the best possible images for your website or online store, you can make some money for hiring a professional photographer or for photo editing services. We offer discounts for bulk images.
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <a href="{{ route('pricing') }}" class="btn btn-secondary rounded mr-2">Pricing</a>

                        @if(auth()->user())
                            <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded mr-2">Place Order</a>
                            <a href="{{ route('freeTrail') }}" class="btn btn-secondary rounded">Free Trial</a>
                        @else
                            <a href="#" class="btn btn-warning rounded mr-2" data-toggle="modal" data-target="#loginModal">Place Order</a>
                            <a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#loginModal">Free Trial</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
