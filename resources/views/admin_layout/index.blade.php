@extends('admin_layout.layout.admin_master')

@section('content')
<style>
    .dashboardCard {
        position: relative; 
        top: -80px; 
        left: 280px; 
        height: 70px; 
        filter: invert(95%) sepia(43%) saturate(3128%) hue-rotate(170deg) brightness(70%) contrast(87%);
    }

    .dashboardCard1 {
        position: relative; 
        top: -80px; 
        left: 280px; 
        height: 75px; 
        filter: invert(95%) sepia(43%) saturate(3128%) hue-rotate(170deg) brightness(70%) contrast(87%);
    }

    #social-links ul {
        display: flex;
        justify-content: center;
        list-style: none;
        font-size: 60px;
    }

    #social-links li {
        margin-right: 20px;
    }
</style>
@if(Auth::user()->hasRole('admin'))
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: #bb6b6b">
                <div class="inner">
                <h3 style="color: white;">{{ count($tags) }}</h3>
        
                <p class="text-white">Header Tags</p>
                </div>
                <div class="icon">
                <i class="fas fa-heading"></i>
                </div>
                <a href="{{ route('admin.header.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ count($users) }}</h3>
        
                <p>Users</p>
                </div>
                <div class="icon">
                <i class="fa fa-users"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: darkslategray">
                <div class="inner">
                <h3 class="text-white">{{ count($freetrial) }}</h3>
        
                <p class="text-white">Free Trials</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-certificate"></i>
                </div>
                <a href="{{ route('admin.freeorder.index', ['status'=> 'all']) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3 class="text-white">{{ count($orders) }}</h3>
        
                <p class="text-white">Orders</p>
                </div>
                <div class="icon">
                <i class="fas fa-luggage-cart"></i>
                </div>
                <a href="{{ route('admin.order.all') }}" class="small-box-footer" style="color: #FFFFFF !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ count($invoices) }}</h3>
        
                <p>Invoices</p>
                </div>
                <div class="icon">
                <i class="fas fa-receipt"></i>
                </div>
                <a href="{{ route('admin.invoice.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: #ABCDEF;">
                <div class="inner" style="height: 112px">
                    <h3 class="text-white">{{ count($services) }}</h3>
                    <p class="text-white">Service</p>
                    <div class="icon">
                        <i class="far fa-images"></i>
                    </div>
                    {{-- <img id="service-icon" class="icon dashboardCard" src="https://img.icons8.com/ios-filled/100/000000/service.png" style=""> --}}
                </div>
                <a href="{{ route('admin.service.index') }}" id="service-link" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: #5858c3d1">
                <div class="inner">
                <h3 class="text-white">{{ count($portfolios) }}</h3>
        
                <p class="text-white">Portfolio</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="{{ route('admin.portfolio.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: #3d403d6e">
                <div class="inner">
                <h3 class="text-white">{{ count($pricing) }}</h3>
        
                <p class="text-white">Pricing</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('admin.pricing.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@else
    <div class="row text-center">
        <div class="col-12">
            <div class="card">
                <h4 class="mt-4" style="font-family: monospace;">Refrral Link: {{auth()->user()->referral_link}}</h4>
                {!! $socialShare !!}
                <h5 class="mb-3 text-success">Gift amount: {{ auth()->user()->profile->gift }} $</h5>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box" style="background-color: darkslategray">
                <div class="inner">
                <h3 class="text-white">{{ count($freetrials) }}</h3>
        
                <p class="text-white">Free Trials</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-certificate"></i>
                </div>
                <a href="{{ route('user.free.index', ['status'=> 'all']) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3 class="text-white">{{ count($orders) }}</h3>
        
                <p class="text-white">Orders</p>
                </div>
                <div class="icon">
                <i class="fas fa-luggage-cart"></i>
                </div>
                <a href="{{ route('user.dashboard.order.all') }}" class="small-box-footer" style="color: #FFFFFF !important;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ count($invoices) }}</h3>
        
                <p>Invoices</p>
                </div>
                <div class="icon">
                <i class="fas fa-receipt"></i>
                </div>
                <a href="{{ route('user.dashboard.invoice.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="emailReferral" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Share referral link</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.email.referral') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
        </div>
    </div>
    </div>
@endif

	
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#service-card').hover(function() {
                // console.log('aaa');
                $('#service-icon').removeClass('dashboardCard').addClass('dashboardCard1');
            })

            $('#service-card').mouseout(function() {
                // console.log('aaa');
                $('#service-icon').removeClass('dashboardCard1').addClass('dashboardCard');
            })

            let social = document.getElementById('social-links');
            let s_links = social.getElementsByTagName('a');
            let length = s_links.length;

            for (let index = 0; index < s_links.length; index++) {
                s_links[index].target = "_blank";
            }

            $('#social-links ul').append('<li><a target="_blank" href="" data-toggle="modal" data-target="#emailReferral" class="social-button " id="" title=""><span class="fas fa-envelope-open-text"></span></a></li>');
        })
    </script>
@endsection