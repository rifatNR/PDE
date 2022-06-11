@extends('users.layouts.master')

@section('title')
<title>Portfolio | Photo Design Expert</title>

@endsection

@section('content')

<main id="main">



      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio mt-5">
        <div class="container pt-5">

            <div class="section-title" data-aos="zoom-out">
                <h2>Portfolio</h2>
                <p>What we've done</p>
            </div>

            <?php $services = \App\Model\DynamicService::where('status', 1)->orderBy('id', 'ASC')->get() ?>

                <ul id="portfolio-flters" class="d-flex" data-aos="fade-up">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($services as $service)
                        <?php
                            $name = $service->name;
                            $array = explode(" ", $name);

                            if($name == "Remove Background" || $name == "Photo manipulation" || $name == "Image Retouching" || $name == "Image Masking") 
                            {
                                $s_name = $array[1];
                            }
                            else if ($name == 'Color Correction')
                            {
                                $s_name = $array[0] . ' ' . $array[1];
                            }
                            else 
                            {
                                $s_name = $array[0];
                            }
                        ?>  

                        <li class="text-capitalize" data-filter=".{{ $service->slug }}">{{ $s_name }}</li>
                    @endforeach
                </ul>

            {{-- <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".clip">Clipping</li>
                <li data-filter=".bg">Background</li>
                <li data-filter=".shadow">Shadow</li>
                <li data-filter=".retouch">Retouching</li>
                <li data-filter=".masking">Masking</li>
                <li data-filter=".ecom">ECommerce</li>
                <li data-filter=".manipulation">Manipulation</li>
                <li data-filter=".color">Color</li>
                <li data-filter=".jewelary">Jewelary</li>
            </ul> --}}

            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($services as $service)
                    @foreach($service->portfolioImages as $image)
                        <div class="col-lg-4 col-md-6 portfolio-item {{ $service->slug }}">
                            <div class="portfolio-img">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset($image->image1) }}" alt=""
                                        class="img-fluid" style="width: 300px; height: 225px;">
                                    <img src="{{ asset($image->image2) }}" alt=""
                                        class="img-fluid" style="width: 300px; height: 225px;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

                {{-- <div class="col-lg-4 col-md-6 portfolio-item bg">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/bg/Background 6.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/bg/Background 6a.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item shadow">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/shadow/1.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/shadow/2.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item masking">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/masking/1(1).jpg') }}" alt="" class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/masking/2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item retouch">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/retouch/1.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/retouch/2.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item ecom">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/ecom/Color 5ba.jpg') }}" alt="" class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/ecom/Color 5bb.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item manipulation">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/manipulation/c1.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/manipulation/c2.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item color">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/color/ac.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/color/ad.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item jewelary">
                    <div class="portfolio-img">
                        <div class="twentytwenty-container">
                            <img src="{{ asset('assets/img/portfolio/port/jewelary/10.jpg') }}" alt=""
                                class="img-fluid">
                            <img src="{{ asset('assets/img/portfolio/port/jewelary/11.jpg') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main>

@endsection
