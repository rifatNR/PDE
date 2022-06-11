@extends('admin_layout.layout.admin_master')

@section('content')

    <div class="row">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> Photo Design Expert
                            <small class="float-right">Date: {{ $orders->created_at }}</small>
                        </h4>
                    </div>
                {{--                    {{ $orders }}--}}
                <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>Admin, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: {{ $orders->phone }}<br>
                            Email: {{ $orders->user->email }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice </b><br>
                        <br>
                        <b>Order ID:</b> {{ $orders->id }}<br>
                        {{--                        <b>Payment Due:</b> 2/22/2014<br>--}}
                        {{--                        <b>Account:</b> 968-34567--}}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-12 col-sm-3">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span
                                                        class="info-box-text text-center text-muted">Quantity</span>
                                                    <span
                                                        class="info-box-number text-center text-muted mb-0">{{ $orders->quantity }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Delivery Time</span>
                                                    <span
                                                        class="info-box-number text-center text-muted mb-0">{{ $orders->delivery_time }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Image Format</span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $orders->image_format }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Background Option</span>
                                                    <span class="info-box-number text-center text-muted mb-0">{{ $orders->backgroundchoice }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        <i class="fas fa-text-width"></i>
                                                        Description
                                                    </h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <dl class="row">
                                                        <dt class="col-sm-4">Services</dt>

                                                        <dd class="col-sm-8">
                                                            @foreach( unserialize($orders->services) as $item)
                                                                {{ $item }},
                                                            @endforeach
                                                        </dd>
                                                        {{--                                                        <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>--}}
                                                        <dt class="col-sm-4">Background Option</dt>
                                                        <dd class="col-sm-8">{{ $orders->backgroundchoice }}</dd>
                                                        <dt class="col-sm-4">Image 1</dt>
                                                        <dd class="col-sm-8"><img src="{{ asset('free_trail/'.$orders->created_at->format('Y-m-d').'/'.$orders->image_1.'') }}" alt="" width="100%"></dd>
                                                        <dt class="col-sm-4">Image 2</dt>
                                                        <dd class="col-sm-8"><img src="{{ asset('free_trail/'.$orders->created_at->format('Y-m-d').'/'.$orders->image_2.'') }}" alt="" width="100%"></dd>
{{--                                                        @if($orders->placeorderimages == null)--}}
{{--                                                            <dd class="col-sm-8">place_order/{{ $orders->created_at->format('Y-m-d') }}/{{ $orders->id }}</dd>--}}
{{--                                                        @else--}}
{{--                                                            <dd class="col-sm-8">place_order/{{ $orders->created_at->format('Y-m-d') }}/{{ $orders->id }}</dd>--}}
{{--                                                        @endif--}}
                                                        {{--                                                        {{ $orders->placeorderimages }}--}}
                                                        {{--                                                        <dd class="col-sm-8">place_order/{{ $orders->created_at->format('Y-m-d') }}/{{ $orders->id }}</dd>--}}
                                                    </dl>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Instructions</h3>
                                    <p class="text-muted">{{ $orders->instruction }}</p>
                                    <br>
                                    {{--                                    <div class="text-muted">--}}
                                    {{--                                        <p class="text-sm">Client Company--}}
                                    {{--                                            <b class="d-block">Deveint Inc</b>--}}
                                    {{--                                        </p>--}}
                                    {{--                                        <p class="text-sm">Project Leader--}}
                                    {{--                                            <b class="d-block">Tony Chicken</b>--}}
                                    {{--                                        </p>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <h5 class="mt-5 text-muted">Project files</h5>--}}
                                    {{--                                    <ul class="list-unstyled">--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="" class="btn-link text-secondary"><i--}}
                                    {{--                                                    class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="" class="btn-link text-secondary"><i--}}
                                    {{--                                                    class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="" class="btn-link text-secondary"><i--}}
                                    {{--                                                    class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="" class="btn-link text-secondary"><i--}}
                                    {{--                                                    class="far fa-fw fa-image "></i> Logo.png</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="" class="btn-link text-secondary"><i--}}
                                    {{--                                                    class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                    </ul>--}}
                                    {{--                                    <div class="text-center mt-5 mb-3">--}}
                                    {{--                                        <a href="#" class="btn btn-sm btn-primary">Add files</a>--}}
                                    {{--                                        <a href="#" class="btn btn-sm btn-warning">Report contact</a>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection
