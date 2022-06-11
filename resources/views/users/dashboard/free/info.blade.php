@extends('admin_layout.layout.admin_master')

@section('content')
    <div class="row invoice">
        <div class="col-12">
            <div class="col-12 mt-3 p-2 mb-15 d-flex float-right">
                    <h4 class="">
                        @if($order->status == 'new')
                            <small class="badge badge-primary">
                                Status: {{ $order->status }}
                            </small>
                        @elseif($order->status == 'accepted')
                            <small class="badge badge-success">
                                Status: {{ $order->status }}
                            </small>
                        @elseif ($order->status == 'rejected')
                            <small class="badge badge-danger">
                                Status: {{ $order->status }}
                            </small>
                        @elseif ($order->status == 'processing')
                            <small class="badge badge-warning">
                                Status: {{ $order->status }}
                            </small>
                        @elseif ($order->status == 'QC')
                            <small class="badge badge-info">
                                Status: {{ $order->status }}
                            </small>
                        @else
                            <small class="badge badge-dark">
                                Status: {{ $order->status }}
                            </small>
                        @endif
                    <h4>

                    @if($order->status == 'completed' )
                        @if($order->mail_sent == 1)
                            <h4 class="col-sm float-right" style="text-align: right;">
                                    <span class="m-2 badge badge-success">
                                        Mail Sent
                                    </span>
                            </h4>
                        @endif
                    @endif
            </div>
            <!-- Main content -->
            <div class="row mb-5 mt-5 w-100" style="align-items: center; justify-content: center">
                @if($order->status == 'rejected')
                    <ul class="nav nav-tabs process-model more-icon-preocess text-center" role="tablist" style="width: 80%">
                        <li role="presentation" class="@if ($order->status == 'rejected') active  @endif">
                            <i class="fas fa-times-circle @if ($order->status == 'rejected') text-danger @else text-muted  @endif" aria-hidden="true"></i>
                            <p>Rejected</p>
                        </li>
                        <li role="presentation" class="@if ($order->status == 'new') active  @endif">
                            <i class="fas fa-folder-open @if ($order->status == 'new') text-primary @else text-muted  @endif" aria-hidden="true"></i>
                            <p>New</p>
                        </li>
                    </ul>
                @else
                    <ul class="nav nav-tabs process-model more-icon-preocess text-center" role="tablist" style="width: 80%">
                        <li role="presentation" class="@if ($order->status == 'new') active  @endif">
                            <i class="fas fa-folder-open @if ($order->status == 'new') text-primary @else text-muted  @endif" aria-hidden="true"></i>
                            <p>New</p>
                        </li>
                        <li role="presentation" class="@if ($order->status == 'accepted') active  @endif">
                            <i class="fas fa-vote-yea @if ($order->status == 'accepted') text-success @else text-muted  @endif" aria-hidden="true"></i>
                            <p>Accepted</p>
                        </li>
                        <li role="presentation" class="@if ($order->status == 'processing') active  @endif">
                            <i class="fas fa-spinner fa-spin @if ($order->status == 'processing') text-warning @else text-muted  @endif" aria-hidden="true"></i>
                            <p>Processing</p>
                        </li>
                        <li role="presentation" class="@if ($order->status == 'QC') active  @endif">
                            <i class="fas fa-clipboard-list @if ($order->status == 'QC') text-info @else text-muted  @endif" aria-hidden="true"></i>
                            <p>QC</p>
                        </li>
                        <li role="presentation" class="@if ($order->status == 'completed') active  @endif">
                            <i class="fas fa-check-double @if ($order->status == 'completed') text-dark @else text-muted @endif" aria-hidden="true"></i>
                            <p>Completed</p>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="p-3 mb-3">
                <!-- title row -->
                {{-- <div class="row mb-15 d-flex justify-content-between">
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 d-flex">
                        <h4 class="">
                            <small class="badge badge-success">
                                Status: {{ $order->status }}
                            </small>
                        <h4>
                        @if($order->status != 'new' && $order->status != 'rejected')
                            <h4 class="col-sm">
                                <small id="updateBtn" data-toggle="modal" data-target="#statusUpdateModal{{ $order->id }}">
                                    <span data-toggle="tooltip" data-theme="dark" title="Update Status" class="m-2">
                                        <i class="fas fa-edit text-info" onclick="updateStatus({{ $order->id }})"></i>
                                    </span>
                                    @include('admin_layout.pages.dashboard.order.status_update_modal')
                                </small>
                            </h4>
                        @endif
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-4 col-xl-4">
                        <h5>
                            <small class="float-right">Date: {{ $order->created_at }}</small>
                        </h5>
                    </div>
                </div> --}}
                <!-- info row -->
                <div class="row invoice-info mb-15">
                    <div class="col-sm-6 invoice-col">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header" style="font-size:20px; font-style:italic;"><strong>From</strong></div>
                            <div class="card-body">
                                <strong>Name :</strong> {{ $order->user->name }}<br>
                                <strong>Address :</strong> {{ $order->user->profile->address }} {{ $order->user->profile->state }} <br>
                                <strong>Country :</strong> {{ $order->user->country }}<br>
                                <strong>Phone :</strong> {{ $order->phone }}<br>
                                <strong>Email :</strong> {{ $order->user->email }}
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-6 invoice-col">
                        <div class="card text-white bg-secondary mb-3">
                            <div class="card-header" style="font-size:20px; font-style:italic;"><strong>Time</strong></div>
                            <div class="card-body">
                                <strong>Submitting Time : </strong><span id="c" class=""></span><br>
                                <strong>Updating Time : </strong><span id="u" class=""></span><br>
                                <strong>Starting Time : </strong><span id="s" class=""></span><br>
                                <strong>Ending Time : </strong><span id="e" class=""></span><br>
                            </div>
                          </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-12 col-sm">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span
                                    class="info-box-text text-center text-muted">Quantity</span>
                                <span
                                    class="info-box-number text-center text-muted mb-0">{{ $order->quantity }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Delivery Time</span>
                                <span
                                    class="info-box-number text-center text-muted mb-0">{{ $order->delivery_time }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Image Format</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $order->image_format }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Background Option</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $order->backgroundchoice }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table row -->

                {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Description
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Services:</dt>

                                <dd class="col-sm-8">
                                    @foreach( unserialize($order->services) as $item)
                                        {{ $item }},
                                    @endforeach
                                </dd>
                            </dl>
                            <dl class="row">
                                {{-- @foreach($order->placeorderimages as $image) --}}
                                    <dd>
                                        <img src="{{ asset($order->image_1) }}" alt="" width="100%">
                                    </dd>
                                    <dd>
                                        <img src="{{ asset($order->image_2) }}" alt="" width="100%">
                                    </dd>
                                {{-- @endforeach  --}}
                            </dl>

                        </div>
                    </div>

                    
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Instruction</h5>
                            <p class="card-text">{{ $order->instruction }}</p>
                        </div>
                    </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection

@section('script')
    <script>
        document.getElementById('updateBtn').style.cursor = 'pointer';
        updateStatus = (id) => {
            console.log(id);
        }
    </script>

    <script>
        let order = {!! json_encode($order, JSON_HEX_TAG) !!};
    
        var submit_date = new Date(order.created_at)
        var update_date = new Date(order.updated_at);
        
        console.log(submit_date.toLocaleString());
        console.log(update_date.toLocaleString());

        document.getElementById('c').innerText = submit_date.toLocaleString()
        document.getElementById('u').innerText = update_date.toLocaleString()

        if(order.starting_date != null) {
            var start_date = convertUTCDateToLocalDate(new Date(order.starting_date));
            document.getElementById('s').innerText = start_date.toLocaleString()
        }

        if(order.ending_date != null) {
            var end_date = convertUTCDateToLocalDate(new Date(order.ending_date));
            document.getElementById('e').innerText = end_date.toLocaleString()
        }
        
    
        // let a = document.getElementById('h_start').value;
        // var date = convertUTCDateToLocalDate(new Date(a));
        // console.log(date.toLocaleString());
    
    
        function convertUTCDateToLocalDate(date) {
            var newDate = new Date(date.getTime()+date.getTimezoneOffset()*60*1000);
        
            var offset = date.getTimezoneOffset() / 60;
            var hours = date.getHours();
        
            newDate.setHours(hours - offset);
        
            return newDate;   
        }
  </script>
@endsection
