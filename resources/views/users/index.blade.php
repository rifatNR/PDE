@extends('users.layouts.master')

@section('title')
    <title>Photo Design Expert Is Bulk Image Editing Company</title>
    
    <style>
        .f-btn {
            width: 200px !important;
        }
    </style>

@endsection

@section('content')

    <!--begin::creating-role-if not exist-->
    @php

        //creating admin if not exist

        $is_admin_exist = \App\User::where('email', 'admin@admin.com')->first();
        if(!$is_admin_exist) {

        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('password');
        $user->save();

        $roles = \Spatie\Permission\Models\Role::all();
        if(sizeof($roles) == 0) {
            \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        }
        $role =  \Spatie\Permission\Models\Role::where('name', 'admin')->first();
            $user->assignRole($role);
        }


    @endphp
    <!--end::creatingrole-if not exist-->


    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" class="container-fluid px-0 carousel carousel-fade" data-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container slider_one">
                    <div class="slide_content">
                        <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Photo Design Expert</span>
                        </h2>
                        <p class="animate__animated fanimate__adeInUp">Photo Design Expert (PDE) provides photo editing
                            service
                            using the world’s advanced technology and high quality manpower. Our designers are very
                            professional
                            and skilled. So they easily understand what is your desired? And they use secret technology
                            & apply
                            attention cordially.
                        </p>

                        @if(auth()->user())
                            <a href="{{ route('freeTrail') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Lets Your Free Trial </span></a>
                            <a href="{{ route('placeOrder') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote </span></a>

                        @else
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Lets Your Free Trial </span></a>
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote</span></a>
                        @endif
                    </div>
                    <div class="slide_wave">
                        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 "
                             preserveAspectRatio="none">
                            <defs>
                                <path id="wave-path"
                                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                            </defs>
                            <g class="wave1">
                                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                            </g>
                            <g class="wave2">
                                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                            </g>
                            <g class="wave3">
                                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item slider_two">
                <div class="carousel-container slider_two">
                    <div class="slide_content">
                        <h2 class="animate__animated animate__fadeInDown">Professional Photo editing</h2>
                        <p class="animate__animated animate__fadeInUp">PDE fulfills your desired image; reduces extra
                            mental pressure through give the best communication and services. It becomes a good
                            acceptable for a client and increases your business.</p>

                        @if(auth()->user())
                            <a href="{{ route('freeTrail') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Lets Your Free Trial </span></a>
                            <a href="{{ route('placeOrder') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote </span></a>

                        @else
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Lets Your Free Trial </span></a>
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote</span></a>
                        @endif
                        
                    </div>
                    <div class="slide_wave">
                        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 "
                             preserveAspectRatio="none">
                            <defs>
                                <path id="wave-path"
                                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                            </defs>
                            <g class="wave1">
                                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                            </g>
                            <g class="wave2">
                                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                            </g>
                            <g class="wave3">
                                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item ">
                <div class="carousel-container slider_three">
                    <div class="slide_content">

                        <h2 class="animate__animated animate__fadeInDown">To meet your Aspiration</h2>
                        <p class="animate__animated animate__fadeInUp">We are not saying to give work to edit the image
                            without the test directly. PDE offers you to prove us through a free trial image editing.
                            Confidently, we are saying that there are outstanding materials and a very skilled
                            designer.</p>

                       @if(auth()->user())
                            <a href="{{ route('freeTrail') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Lets Your Free Trial </span></a>
                            <a href="{{ route('placeOrder') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote </span></a>

                        @else
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Lets Your Free Trial </span></a>
                            <a href="#" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4" data-toggle="modal" data-target="#loginModal"><span class="hero-span"> Place Your Order Now </span></a>
                            <a href="{{ route('pricing') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto mt-4"><span class="hero-span">Get Your Quote</span></a>
                        @endif
                    </div>
                    <div class="slide_wave">

                        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 "
                             preserveAspectRatio="none">
                            <defs>
                                <path id="wave-path"
                                      d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                            </defs>
                            <g class="wave1">
                                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                            </g>
                            <g class="wave2">
                                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                            </g>
                            <g class="wave3">
                                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                            </g>
                        </svg>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>


    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>About</h2>
                    <p>Who we are</p>

                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6 px-0 px-md-3">
                        <div class="about_content">
                            <p class="overflow-auto pr-3 text-justify">

                                At present, the highest popular trade is outsourcing and its growth increases amazingly.
                                Today crosses multi-billion. So it is turning us faster and more competitive. This makes
                                it necessary for entrepreneurs and professionals to work more efficiently in less time.
                                For these cases, Photo Design Expert (PDE) uses secret technic and cordially hard work
                                which may be appropriate for your requirement.
                                <br><br>
                                PDE is an actual Outsourcing associate and one of the leading photo editing company in
                                Asia. There are sufficient workstations and high speed optical fiber connection with
                                backup here. We have the highest standards of online security and use secure file
                                transfer gateway as the client's images are very worthy. Dedicated servers (FTP) used to
                                welcome and send back your images for secure.
                                <br><br>
                                PDE provides all kinds of photo editing like clipping path service, cut out or Deep etch
                                or Remove background service, image masking service , shadow creation, Image Retouching,
                                image manipulation service, color correction service, jewelry photo editing, and
                                e-commerce image editing at a very affordable and cheap price. We are working with
                                Photographers, image-studios, printing press, advertising agencies, catalog companies,
                                Magazine agency graphic design companies.
                                <br><br>
                                As an occupational through outsourcing, you should think of quality products, skilled
                                manpower, time management, communication ability, business-friendly environment and
                                advance technology & equipment of the providing company. We are able all the above
                                things. PDE ensures to increase sales by providing quality products. We cannot insist to
                                give us work. But PDE is saying to take a chance by a free trial.
                                <br><br>
                                PDE offers excellent services in globally by Web-Based outsource aright into your
                                position of work and committed to doing work for client satisfaction through 24/7/365.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 mt-3 mt-md-0">
                        <div class="row justify-content-center">
                            <h5 class="font-weight-bold trust">TRUSTED FOR</h5>
                            <h2 class="font-weight-bolder text-capitalize ">Perfect photo editing company</h2>
                        </div>
                        
                        <div class="d-flex flex-row justify-content-between mt-3 card-body no-padding row">
                            <div class="col-12 col-md-6 pt-3 font-weight-bold pb-0">
                                <ul class="mb-0">
                                    <li>Highly Expert & Professional 50+ Designer</li>
                                    <li>Double & high Bandwidth internet Connection</li>
                                    <li>Alternative power supply</li>
                                    <li>Latest & high configuration equipment</li>
                                    <li>Dedicated FTP Server</li>
                                </ul>
                                <!-- <p>1. Highly Expert & Professional 50+ Designer.</p>
                                <p>2. Double & high Bandwidth internet Connection</p>
                                <p>3. Alternative power supply</p>
                                <p>4. Latest & high configuration equipment</p>
                                <p>5. Dedicated FTP Server</p> -->
                            </div>
                            <div class="col-12 col-md-6 pb-3 pt-3 font-weight-bold">
                                <ul>
                                    <li>We are available 24x7 in 365 days</li>
                                    <li>We provide faster turnaround</li>
                                    <li>Monthly payment facility</li>
                                    <li>We provide services until the client satisfy</li>
                                    <li>Three step quality control</li>
                                </ul>
                                <!-- <p>1. We are available 24x7 in 365 days</p>
                                <p>2. We provide faster turnaround</p>
                                <p>3. Monthly payment facility</p>
                                <p>4. We provide services until the client satisfy</p>
                                <p>5. Three step quality control</p> -->
                            </div>

                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <a href="{{ route('pricing')}}" class="btn-learn-more">See More</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
    
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>FEATURE</h2>
                    <p>Benefits You will Get</p>
                </div>


                <div class="position-relative">


                    <div class="d-flex flex-column flex-md-row justify-content-between">

                        <div class="">
                            <p class="font-weight-bold benefit_title"><i class="fas fa-users"></i> Dedicated team:</p>
                            <p class="text-justify benefit_text">To get your own team of image editors for your project that may be dedicated only for
                                your project.</p>
                            <p class="font-weight-bold benefit_title"><i class="far fa-images"></i> High volume image
                                editing:</p>
                            <p class="text-justify benefit_text">The perfect result for thousands of images every day by professional photo editors.</p>
                            <p class="font-weight-bold benefit_title"><i class="fas fa-hand-holding-usd"></i> Custom
                                Quotation:</p>
                            <p class="text-justify benefit_text">We are offering a very low price depending on the requirements for your images.</p>
                            <p class="font-weight-bold benefit_title"><i class="fas fa-shipping-fast"></i> Faster
                                delivery:</p>
                            <p class="text-justify benefit_text mb-0">Skilled and trained teams edit thousands of images daily, which can deliver within 24
                                hours or perhaps quickly.</p>
                            <!--<div class="text-center">-->
                            <!--    @if(auth()->user())-->
                            <!--        <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-2">Lets Your Free Trial</a>-->
                            <!--    @else-->
                            <!--        <a href="#" class="btn btn-warning rounded mr-2" data-toggle="modal" data-target="#loginModal">Lets Your Free Trial</a>-->
                            <!--    @endif-->
                            <!--</div>-->
                        </div>
                        <div class="benifits_div py-5 text-center">
                            <img src="{{ asset('assets/img/background/benefitits.png')}}" width="80%" alt="benifits-round-img">
                        </div>
                        <div class="">
                            <p class="font-weight-bold benefit_title"><i class="fas fa-lock"></i> 100% Secure:</p>
                            <p class="text-justify benefit_text">We maintain the images of our clients with confidentiality.</p>
                            <p class="font-weight-bold benefit_title"><i class="fas fa-headset"></i> Unbelievable
                                Support:</p>
                            <p class="text-justify benefit_text">We ensure you that there will always be support from us alternate of computer-generated
                                email.</p>
                            <p class="font-weight-bold benefit_title"><i class="fas fa-money-check-alt"></i> Payment
                                facility:</p>
                            <p class="text-justify benefit_text">You can pay on a weekly or monthly basis as per your requirements. It may be payable
                                after a job.</p>
                            <p class="font-weight-bold benefit_title"><i class="far fa-handshake"></i> Especial
                                opportunity:</p>
                            <p class="text-justify benefit_text">It is a great opportunity that you can monitor the progress of your project on your
                                computer at any moment.</p>
                            <!--<div class="text-center">-->
                            <!--    @if(auth()->user())-->
                            <!--        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded">Place Your Order Now</a>-->
                            <!--    @else-->
                            <!--        <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Place Your Order Now</a>-->
                            <!--    @endif-->
                            <!--</div>-->
                        </div>

                    </div>

                </div>

                <div class="row d-flex justify-content-center">
                    @if(auth()->user())
                        <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded mr-0 mr-md-4 mb-3 mb-md-0 f-btn">Lets Your Free Trial</a>
                        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded f-btn">Place Your Order Now</a>
                    @else
                        <a href="#" class="btn btn-warning rounded mr-0 mr-md-4 mb-3 mb-md-0 f-btn" data-toggle="modal" data-target="#loginModal">Lets Your Free Trial</a>
                        <a href="#" class="btn btn-warning rounded f-btn" data-toggle="modal" data-target="#loginModal">Place Your Order Now</a>
                    @endif
                </div>

            </div>
        </section>

        <!-- ======= Features Section ======= -->
        <section id="features" class="features mb-5 mb-md-0">
            <div class="container">

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-3" data-aos="zoom-in" id="clip" onclick="getActive(this.id)">
                        <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                            <i class="fal fa-bezier-curve"></i>
                            <h4 class="d-none d-lg-block">Clipping Path</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100" id="background" onclick="getActive(this.id)">
                        <a class="nav-link" data-toggle="tab" href="#tab-2">
                            <i class="fab fa-accusoft"></i>
                            {{--                            <img src="{{ asset('assets/img/icons/2.svg') }}" width="48px"
                            height="48px" alt="">--}}
                            <h4 class="d-none d-lg-block">Remove Background</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200" id="retouch" onclick="getActive(this.id)">
                        <a class="nav-link" data-toggle="tab" href="#tab-3">
                            <i class="fal fa-image"></i>
                            <h4 class="d-none d-lg-block">Image Retouching</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300" id="shadowCreation" onclick="getActive(this.id)">
                        <a class="nav-link" data-toggle="tab" href="#tab-4">
                            <img id="shadowImg" class="filter-pest shadow_icon" src="{{ asset('assets/img/icons/shadow_creation.svg') }}" width="48px" height="48px"
                                 alt="shadow-creation-icon">
                            <h4 class="d-none d-lg-block">Shaddow Creation</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content" data-aos="fade-up">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>What is Clipping Path?</h3>
                                <p class="font-italic text-justify">
                                    Clipping path service is essential to create an original and natural image. A person
                                    will choose your product when an image of the product is the most beautiful and
                                    attractive. So it is necessary to create perfect clipping paths. For e-commerce
                                    businesses need clean and crisp images.
                                </p>
                                <p class="text-justify"> Here clipping paths are used which further
                                    convince the visitors to invest in your product.</p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Single clipping path.</li>
                                    <li><i class="ri-check-double-line"></i> Multiple clipping path.</li>
                                </ul>
                                <p class="text-justify">
                                    Our professional skilled graphic designers have years of expertise in providing
                                    Clipping path services. We’re masters of Photoshop’s Pen Tool that permits us to
                                    outline extremely precise clipping methods. We tend to zoom to your image by the
                                    maximum amount as more than 350% drawing every clipping path. This allows us to own
                                    sufficient anchor points to retain the original shape of the object.
                                </p>

                                <div class="d-flex flex-row justify-content-around ">
                                    <div>
                                        <a href="{{ route('servicess', ['slug'=>'clipping-path']) }}" class="btn btn-warning rounded">Read More</a>
                                    </div>
                                    <div>
                                        @if(auth()->user())
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded">Free trail</a>
                                        @else
                                        <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Free trail</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-5.jpg') }}" alt="clipping-path-before"
                                         class="img-fluid">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-6.jpg') }}" alt="clipping-path-after"
                                         class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Remove background from image</h3>
                                <p class="text-justify">
                                    Photo background removal is that the process of knock-out backdrop and deep etch
                                    images uses Adobe Photoshop software. You can use a variant
                                    color background, but a white location is ideal for the online business. Image
                                    background removal service can offer an attractive product for e-commerce
                                    businesses. Transparent background removal is essential in the business logo and
                                    banners.
                                </p>

                                <ul>
                                    <li><i class="ri-check-double-line"></i> Online market requirements, like various
                                        e-commerce companies.
                                    </li>
                                    <li><i class="ri-check-double-line"></i> Confusing background and focus away from
                                        the subject of the image.
                                    </li>
                                    <li><i class="ri-check-double-line"></i> To need to grow attention to an object in
                                        the foreground.
                                    </li>
                                    <li><i class="ri-check-double-line"></i> It needs to isolate and show specific
                                        features of a product.
                                    </li>

                                    <li><i class="ri-check-double-line"></i> To create a transparent background.
                                    </li>
                                </ul>
                                <div class="d-flex flex-row justify-content-around ">
                                    <div>
                                        <a href="{{ route('servicess', ['slug'=>'remove-background-from-image']) }}" class="btn btn-warning rounded">Read More</a>
                                    </div>
                                    <div>
                                        @if(auth()->user())
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded">Free trail</a>
                                        @else
                                            <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Free trail</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-7.jpg') }}" alt="remove-background-before"
                                         class="img-thumbnail">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-8.jpg') }}" alt="remove-background-after"
                                         class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>What is photo (Picture) retouching?</h3>
                                <p class="text-justify">
                                    When talking about post-processing and image editing, the word "photo retouching" is
                                    the process of altering a picture to get ready to improve the image's appearance.
                                    Remember that editing will be an initial correction of the image, but the retouching
                                    is actual photo manipulation to change the look. We are habituated to viewing a
                                    retouched image in print.
                                </p>
                                <p class="text-justify">
                                    There are four skin-retouching techniques on the
                                    photography and retouching market to get smooth skin. You can delete unwanted spots
                                    and even objects from an image used in Photoshop. A professional workflow learns can
                                    help you to work smarter and faster. That way, you'll create the photos you, your
                                    clients, and subjects will love. Unnatural skin tone may make flop the grand
                                    picture. You'll learn how to get skin tones back to normal in any
                                    situation, such as the camera's white balance was off, or there was a color cast
                                    from lights in the environment.
                                </p>

                                <div class="d-flex flex-row justify-content-around ">
                                    <div>
                                        <a href="{{ route('servicess', ['slug'=>'image-retouching']) }}" class="btn btn-warning rounded">Read More</a>
                                    </div>
                                    <div>
                                        @if(auth()->user())
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded">Free trail</a>
                                        @else
                                            <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Free trail</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-1.jpg') }}" alt="image-retouching-before"
                                         height="500px"
                                         class="img-fluid">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-2.jpg') }}" alt="image-retouching-after"
                                         height="500px"
                                         class="img-fluid">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Best Shadow creation in Photoshop 2021</h3>
                                <p class="text-justify">
                                    A shadow will be a dark area where light from a light-weight opaque object blocks
                                    the source. It occupies all of the three-dimensional volumes behind an item with
                                    light ahead of it. A shadow's cross-section may be a two-dimensional silhouette or a
                                    reverse projection of the thing blocking the sunshine.
                                </p>
                                <p class="text-justify">
                                    A graphical method makes a
                                    human-made shadow on any product image to look more natural to the viewers or
                                    customers—most of the famous brands using this system within the appearance of their
                                    product. Here the shadow will be shown behind or under the development of the image.

                                </p>
                                <p class="text-justify">
                                    The idea of a shadow picture is to layer multiple sheets of paper together in
                                    various numbers to inhibit the sun's light from shining through. The varying
                                    thicknesses create lighter and darker areas that make an image. Making one is often
                                    tricky or is usually straightforward, mainly counting on the sort of picture chosen.
                                </p>

                                <div class="d-flex flex-row justify-content-around ">
                                    <div>
                                        <a href="{{ route('servicess', ['slug'=>'shadow-creation']) }}" class="btn btn-warning rounded">Read More</a>
                                    </div>
                                    <div>
                                        @if(auth()->user())
                                            <a href="{{ route('freeTrail') }}" class="btn btn-warning rounded">Free trail</a>
                                        @else
                                            <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Free trail</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <div class="twentytwenty-container">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-3.jpg') }}" alt="shadow-creation-before"
                                         class="img-fluid">
                                    <img src="{{ asset('assets/img/beforeafter/Untitled-4.jpg') }}" alt="shadow-creation-after"
                                         class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="row" data-aos="zoom-out">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3>Call To Action</h3>
                        <p class="text-justify"><b>Photo Design Expert</b> has been providing excellent quality bulk
                            professional image editing services. With a accurate blend of experience, skill, dedication
                            and punctuality, we provide a good range of photo editing services which may assure you the
                            right quality finished work.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        @if(auth()->user())
                            <a class="cta-btn align-middle" href="{{ route('placeOrder') }}">Call To Action</a>
                        @else
                            <a class="cta-btn align-middle" href="#" data-toggle="modal" data-target="#loginModal">Call To Action</a>
                        @endif
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Work-Flow</h2>
                    <p>How do we do</p>
                </div>

                <div class="d-flex flex-column justify-content-center text-center">
                    <div class="mb-5" data-aos="fade-left">
                        <h2 class="font-weight-bold">How We Work For Quality Photo Editing</h2>
                    </div>
                    <div class="mt-3" data-aos="fade-right">
                        <img src="{{ asset('assets/img/background/pc-flow.png')}}" width="80%" alt="our-work-flow">
                    </div>

                </div>

                <div class="row justify-content-center">
                    @if(auth()->user())
                        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded mt-5">Place Your Order Now</a>
                    @else
                        <a href="#" class="btn btn-warning rounded mt-5" data-toggle="modal" data-target="#loginModal">Place Your Order Now</a>
                    @endif
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Portfolio</h2>
                    <p>What we've done</p>
                </div>

                <?php $services = \App\Model\DynamicService::where('status', 1)->orderBy('id', 'ASC')->get() ?>

                <ul id="portfolio-flters" class="d-md-flex" data-aos="fade-up">
                    <li data-filter="*" class="filter-active" id="all" onclick="changeTab(this.id)">All</li>
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
                        
                        <li class="text-capitalize" data-filter=".{{ $service->slug }}" onclick="changeTab(this.id)" id="{{ $service->slug }}">{{ $s_name }}</li>
                    @endforeach
                </ul>

                <div class="row portfolio-container" data-aos="fade-up" id="allService">
                    @foreach($services as $service)
                    <?php $portfolio_image = \App\Model\DynamicPortfolio::where([['service_id', $service->id], ['status', 1]])->orderBy('id', 'DESC')->take(1)->get(); ?>
                        @foreach($portfolio_image as $image)
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
                </div>

                <div class="row portfolio-container" data-aos="fade-up" id="singleService">
                    @foreach($services as $service)
                    <?php $portfolio_image = \App\Model\DynamicPortfolio::where([['service_id', $service->id], ['status', 1]])->orderBy('id', 'DESC')->take(6)->get(); ?>
                        @foreach($portfolio_image as $image)
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
                </div>

                {{-- <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Clipping</li>
                    <li data-filter=".filter-card">Background</li>
                    <li data-filter=".filter-web">Shadow</li>
                    <li data-filter=".filter-web">Retouching</li>
                    <li data-filter=".filter-web">Masking</li>
                    <li data-filter=".filter-web">ECommerce</li>
                    <li data-filter=".filter-web">Manipulation</li>
                    <li data-filter=".filter-web">Color</li>
                    <li data-filter=".filter-web">Jewelary</li>
                </ul> --}}

                <div class="row">
                    <a href="{{ route('allPortfolio') }}" class="btn btn-warning rounded mt-4 mx-auto">See More</a>
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </div>

                <div class="owl-carousel testimonials-carousel" data-aos="fade-up">

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            It helped me with a lot. Definitely, it is the best of the best for a deadline, quality,
                            professional, reliable, as describe and surpassed expectations.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ asset('assets/img/testimonials/edward-shannon.png') }}" class="testimonial-img"
                             alt="testimonials-icon">
                        <h3>H. Rodriguez</h3>
                        <h4>Ceo &amp; Founder</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Photo Design Expert is the most reliable image editing company that quickly, accurately,
                            execute exactly to instructions and keeps stress free.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ asset('assets/img/testimonials/icon.png') }}" class="testimonial-img" alt="testimonials-icon">
                        <h3>Kales Andres</h3>
                        <h4>Designer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            It is proven that Photo design expert is more helpful for beginners. So I recommend working
                            with Photo Design Expert for a better carrier.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ asset('assets/img/testimonials/images.png') }}" class="testimonial-img" alt="testimonials-icon">
                        <h3>S. Murphy</h3>
                        <h4>Store Owner</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Photo Design Expert is super professional on the way of clipping, great job and I'm really
                            happy with the speed. Totally satisfied, highly recommended. Thank you.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ asset('assets/img/testimonials/images (1).png') }}" class="testimonial-img" alt="testimonials-icon">
                        <h3>Maria Silvia</h3>
                        <h4>Freelancer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            PDE has completed a large order of 10,500+ images in a timely manner and is absolutely
                            perfect for our company. We are very pleased to take their services.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{ asset('assets/img/testimonials/images (2).png') }}" class="testimonial-img" alt="testimonials-icon">
                        <h3>Kyle kesper</h3>
                        <h4>Entrepreneur</h4>
                    </div>

                </div>


            </div>
        </section>

        {{-- ===============================================================================================================
                                                                pricing
            ================================================================================================================ --}}

        <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Pricing</h2>
                    <p>Our Competing Prices</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="box" data-aos="zoom-in">

                            <div class="position-relative price-img" style="height: 200px;">
                                <img src="{{ asset('assets/img/pricing/clip1.jpg') }}" alt="clipping-path"
                                     data-img="{{ asset('assets/img/pricing/clip2.jpg') }}" class="swim border w-100"/>
                            </div>

                            <div class="position-relative">
                                <h3 class="text-dark py-2 my-2">Clipping Path</h3>
                                <p class="py-2 my-2 p-start">Starts From</p>
                                <h4><sup>$</sup>0.49<span> / image</span></h4>
                                <ul>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Basic</span><span class="font-weight-bold">$0.49</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Medium</span><span class="font-weight-bold">$0.80</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Complex</span><span class="font-weight-bold">$2.00</span>
                                    </li>

                                </ul>
                                <div class="btn-wrap d-flex justify-content-between">

                                    <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded">More Policy</a>

                                    @if(auth()->user())
                                        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded">Buy Now</a>
                                        <a href="{{ route('freeTrail') }}" class="btn btn-secondary rounded">Free Trial</a>
                                    @else
                                        <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Buy Now</a>
                                        <a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#loginModal">Free Trial</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="box" data-aos="zoom-in">

                            <div class="position-relative price-img" style="height: 200px;">
                                <img src="{{ asset('assets/img/pricing/back1.jpg') }}" alt="remove-background"
                                     data-img="{{ asset('assets/img/pricing/back2.jpg') }}" class="swim border w-100"/>
                            </div>

                            <div class="position-relative">
                                <h3 class="text-dark py-2 my-2">Background Removal</h3>
                                <p class="py-2 my-2 p-start">Starts From</p>
                                <h4><sup>$</sup>0.49<span> / image</span></h4>
                                <ul>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Basic</span><span class="font-weight-bold">$0.49</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Medium</span><span class="font-weight-bold">$0.80</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Complex</span><span class="font-weight-bold">$2.00</span>
                                    </li>

                                </ul>
                                <div class="btn-wrap">
                                    <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded">More
                                        Policy
                                    </a>
                                    @if(auth()->user())
                                        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded">Buy Now</a>
                                        <a href="{{ route('freeTrail') }}" class="btn btn-secondary rounded">Free Trial</a>
                                    @else
                                        <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Buy Now</a>
                                        <a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#loginModal">Free Trial</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="box" data-aos="zoom-in">

                            <div class="position-relative price-img" style="height: 200px;">

                                <img src="{{ asset('assets/img/pricing/shadow1.jpg') }}" alt="shadow-creation"
                                     data-img="{{ asset('assets/img/pricing/shadow2.jpg') }}" class="swim border w-100"/>

                            </div>

                            <div class="position-relative">
                                <h3 class="text-dark py-2 my-2">Shadow</h3>
                                <p class="py-2 my-2 p-start">Starts From</p>
                                <h4><sup>$</sup>0.80<span> / image</span></h4>
                                <ul>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Drop Shadow</span><span class="font-weight-bold">$0.80</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Natural Shadow</span><span class="font-weight-bold">$0.80</span>
                                    </li>
                                    <li class="py-3 px-5 border-bottom d-flex justify-content-between">
                                        <span class="">Reflection Shadow</span><span
                                            class="font-weight-bold">$0.80</span>
                                    </li>

                                </ul>
                                <div class="btn-wrap">
                                    <a href="{{ route('pricePolicy') }}" class="btn btn-secondary rounded">More
                                        Policy
                                    </a>

                                    @if(auth()->user())
                                        <a href="{{ route('placeOrder') }}" class="btn btn-warning rounded">Buy Now</a>
                                        <a href="{{ route('freeTrail') }}" class="btn btn-secondary rounded">Free Trial</a>
                                    @else
                                        <a href="#" class="btn btn-warning rounded" data-toggle="modal" data-target="#loginModal">Buy Now</a>
                                        <a href="#" class="btn btn-secondary rounded" data-toggle="modal" data-target="#loginModal">Free Trial</a>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="row">
                    <a href="{{ route('pricing') }}" class="btn btn-warning rounded mt-4 mx-auto">See More</a>
                </div>

            </div>
        </section>


        <section id="clients" class="clients mt-5 mt-md-0">
            <div class="container" data-aos="zoom-in">

                <div class="row">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/google.png')}}" class="img-fluid" alt="client-google">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/aliexpress.png')}}" class="img-fluid" alt="client-aliexpress">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/sears.png')}}" class="img-fluid" alt="client-sears">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/ozon.png')}}" class="img-fluid" alt="client-ozon">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/walmart.png')}}" class="img-fluid" alt="client-walmart">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/clients/amazon.png')}}" class="img-fluid" alt="client-amazon">
                    </div>

                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-title" data-aos="zoom-out">
                    <h2>TimeZone</h2>
                    <p>Timezone We Follow</p>
                </div>
            </div>
            <div class="clock-all">
                <div class="container d-flex flex-column">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div id="bd"></div>
                            <p class="bascolor">Bangladesh</p>
                            <b>
                                <p id="timeInBd"></p>
                            </b>
                        </div>
                        <div class="col-md-3">
                            <div id="myclock"></div>
                            <p class="bascolor">UK</p>
                            <b>
                                <p id="timeInUK"></p>
                            </b>
                        </div>
                        <div class="col-md-3">
                            <div id="am"></div>
                            <p class="bascolor">Italy</p>
                            <b>
                                <p id="timeInItaly"></p>
                            </b>
                        </div>

                        <div class="col-md-3">
                            <div id="usa"></div>
                            <p class="bascolor">USA</p>
                            <b>
                                <p id="timeInUSA"></p>
                            </b>
                        </div>
                    </div>

                    <div class="text-center my-3">
                        <a href="{{ url('all-timezone') }}" class="btn btn-warning rounded btn-time px-5">Show All Time</a>
                    </div>
                </div>
            </div>

        </section>

        <!-- ======= Contact Section ======= -->
        <!-- End Contact Section -->

    </main>
    <script>
        
        $(document).ready(function() {

            // $('#shadowImg').addClass('filter-pest');

            $('#shadowCreation').hover(function() {
                if($('#shadowCreation').hasClass('active')) 
                {
                    console.log(1);
                    $('#shadowImg').removeClass('filter-pest');
                    $('#shadowImg').addClass('filter-white');
                }
                else
                {
                    console.log(0);
                    $('#shadowImg').addClass('filter-orange');
                    $('#shadowImg').removeClass('filter-pest');
                }
            });

            $('#shadowCreation').mouseleave(function() {
                if($('#shadowCreation').hasClass('active')) 
                {
                    // $('#shadowImg').removeClass('filter-pest');
                    // $('#shadowImg').addClass('filter-white');
                }
                else
                {
                    $('#shadowImg').removeClass('filter-orange');
                    $('#shadowImg').addClass('filter-pest');
                }
            });
        })

        getActive = (id) => {
            console.log(id);
            if(id == 'shadowCreation')
            {
                $('#shadowImg').removeClass('filter-pest');
                $('#shadowImg').addClass('filter-white');
            }
            else
            {
                $('#shadowImg').removeClass('filter-white');
            }
        }

        $(document).ready(function() {
            $('#singleService').hide();
        })

        changeTab = (id) => {
            console.log(id);
            if(id == 'all')
            {
                $('#singleService').hide();
                $('#allService').show();
            }
            else
            {
                $('#singleService').show();
                $('#allService').hide();
            }
        }

    </script>

@endsection
