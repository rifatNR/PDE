@extends('users.layouts.master')

@section('title')
<title>Pricing | Photo Design Expert</title>

@endsection

@section('content')

<style>
    .swim {
        height: 235px !important;
    }

    .h-65 {
        /* height: 45px !important; */
        /* background: #f8f8f8 !important; */
    }

    .h-65 span {
        /* position: relative; */
        /* top: -10px; */
    }

    .p-p {
        /* position: relative !important; */
        /* top: -35px !important; */
        margin-right: 50px !important;
        font-family: "Open Sans", sans-serif !important;
    }

    @media only screen and (max-width: 768px) {
        .p-p {
            margin-right: 0px !important;
        }
    }
</style>

<main id="main">



    {{-- ===============================================================================================================
                                                            pricing
        ================================================================================================================ --}}

    <section id="pricing" class="pricing">
        <div class="container">

            <div class="section-title text-center" data-aos="zoom-out">
                <h2>Pricing</h2>
                <p>Our Competing Prices</p>
            </div>

            <?php
            $pricings = \App\Model\DynamicPricing::all();
            ?>

            @foreach ($pricings as $item)
                <div class="row"> {{--  Pricing Row --}}

                    <div class="col-12 mb-4">

                        <div class="box" data-aos="zoom-in">

                            <div class="row">
                                <div class="col-12">
                                    <h3 class="d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start align-items-md-center
                                                text-dark py-3 mb-4 mt-2 border-bottom h-65">
                                        <span class="mb-2 mb-md-0">
                                            @if($item->service)
                                                {{ $item->service->name }}
                                            @else
                                                {{ $item->name }}
                                            @endif
                                        </span>

                                        <span class="p-start p-p">Price Starts From  ${{ $item->pricing_1_amount }}</span>
                                    </h3>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="position-relative price-img h-100 border" style="margin-right: 10px">
                                        <img class="abs-center h-100" src="{{ asset( $item->image1 ) }}" data-img="{{ asset( $item->image2 ) }}" class="swim"/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="position-relative">
                                        <ul>
                                            <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                                <span class="">{{ $item->pricing_1_name }}</span><span class="font-weight-bold">${{ $item->pricing_1_amount }}</span>
                                            </li>
                                            <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                                <span class="">{{ $item->pricing_2_name }}</span><span class="font-weight-bold">${{ $item->pricing_2_amount }}</span>
                                            </li>
                                            <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                                <span class="">{{ $item->pricing_3_name }}</span><span class="font-weight-bold">${{ $item->pricing_3_amount }}</span>
                                            </li>

                                        </ul>
                                        <div class="btn-wrap d-flex justify-content-center">
                                            <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                            @guest()
                                                <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                                <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded">Place Order</a>
                                            @else
                                                <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                                <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded">Place Order</a>
                                            @endguest

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div> {{-- End Pricing Row --}}
            @endforeach


            {{-- <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Background Removal</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Basic Background Remove</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Medium Background Remove</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Complex Background Remove</span><span class="font-weight-bold">$0.49</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Shadow</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Drop Shadow</span><span class="font-weight-bold">$0.25</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Natural Shadow</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Reflection Shadow</span><span class="font-weight-bold">$0.49</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Maniquine</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Remove Maniquine</span><span class="font-weight-bold">$0.99</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Neck Joint</span><span class="font-weight-bold">$0.99</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Sleeves Joint</span><span class="font-weight-bold">$1.50</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Color</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Color Correction</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Exposure Correction</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Color Conversion</span><span class="font-weight-bold">$2.50</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Retouching</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Product Retouch</span><span class="font-weight-bold">$0.49</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Basic Retouch</span><span class="font-weight-bold">$0.99</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Beauty/Glammer Retouch</span><span class="font-weight-bold">$2.50</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Masking</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Hair Masking</span><span class="font-weight-bold">$1.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Layer Masking</span><span class="font-weight-bold">$1.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Alpha Masking</span><span class="font-weight-bold">$1.00</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Vector Conversion</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Rester To Vector</span><span class="font-weight-bold">$3.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Product To Vector</span><span class="font-weight-bold">$5.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Vector Line Draw</span><span class="font-weight-bold">$5.00</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 mb-4">

                    <div class="box" data-aos="zoom-in">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-dark py-3 mb-4 mt-2 text-left border-bottom">Restoration</h3>
                            </div>
                            <div class="col-5">
                                <div class="position-relative price-img h-100 border">
                                    <img src="{{ asset('assets/img/portfolio/port/clip/Screenshot 1.jpg') }}"
                                    data-img="{{ asset('assets/img/portfolio/port/clip/Screenshot 2.jpg') }}" class="swim" />
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="position-relative">
                                    <ul>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Photo Color Restoration</span><span class="font-weight-bold">$3.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Damage Photo Restoration</span><span class="font-weight-bold">$7.00</span>
                                        </li>
                                        <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                            <span class="">Balck & White Restoration</span><span class="font-weight-bold">$8.00</span>
                                        </li>

                                    </ul>
                                    <div class="btn-wrap d-flex justify-content-end">
                                        <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded mr-3">More Policy</a>
                                        @guest()
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a data-toggle="modal" data-target="#loginModal" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @else
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-3">Free Trial</a>
                                            <a href="{{ route('placeOrder') }}" class="btn btn-secondary rounded mr-3">Place Order</a>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div> --}}




        </div>
    </section>

</main>

@endsection
