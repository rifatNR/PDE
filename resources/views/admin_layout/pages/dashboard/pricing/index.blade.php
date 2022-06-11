@extends('admin_layout.layout.admin_master')

@section('style')
    <link rel="stylesheet" href="{{ asset('d_service/switch.css') }}">
    <link rel="stylesheet" href="{{ asset('d_service/add_service.css') }}">
    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }

        .wrapper {
            justify-content: space-between !important;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <i class="nav-icon fas fa-tags"></i>
                    Pricing
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <button data-toggle="modal" data-target="#addPricing" class="btn btn-primary float-right">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add new
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="pricing_table" class="table table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Service name</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Pricing</th>
                        <th>Pricing</th>
                        <th>Pricing</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL.</th>
                        <th>Service name</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Pricing</th>
                        <th>Pricing</th>
                        <th>Pricing</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $x = 1?>
                      @foreach ($prices as $price)
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td class="text-center">
                                @if($price->service)
                                    {{ $price->service->name }}
                                @else
                                    {{ $price->name }}
                                @endif
                            </td>
                            <td class="text-center">
                                <img src="{{ asset($price->image1) }}" class="img-fluid" alt="" srcset="" style="width: 50px; cursor: pointer" data-toggle="modal" data-target="#previewImage" onclick="previewModal(this)">
                            </td>
                            <td class="text-center">
                                <img src="{{ asset($price->image2) }}" class="img-fluid" alt="" srcset="" style="width: 50px; cursor: pointer" data-toggle="modal" data-target="#previewImage" onclick="previewModal(this)">
                            </td>
                            <td class="text-center">
                                {{ $price->pricing_1_name }}: <strong>{{ $price->pricing_1_amount }} $</strong>
                            </td>
                            <td class="text-center">
                                {{ $price->pricing_2_name }}: <strong>{{ $price->pricing_2_amount }} $</strong>
                            </td>
                            <td class="text-center">
                                {{ $price->pricing_3_name }}: <strong>{{ $price->pricing_3_amount }} $</strong>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <span data-toggle="tooltip" data-theme="dark" title="Edit" class="mr-2">
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#updatePricing" onclick="getInfo({{ $price }})">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </button>
                                    </span>
                                    <span data-toggle="tooltip" data-theme="dark" title="delete" class="">
                                        <button data-toggle="modal" data-target="#deleteModal" onclick="getId({{ $price }})" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                    </span>
                                </div>
                                {{-- <span data-toggle="tooltip" data-theme="dark" title="Active/Inactive" id="isActive">
                                    @if($service->status == 1)
                                        <input class="switch" onclick="isActive({{ $service->id }})" type="checkbox" checked />
                                    @else
                                        <input class="switch" onclick="isActive({{ $service->id }})" type="checkbox"/>
                                    @endif
                                </span> --}}
                            </td>
                      @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin_layout.pages.dashboard.pricing.add_pricing_modal')
    @include('admin_layout.pages.dashboard.portfolio.preview_image_modal')
    @include('admin_layout.pages.dashboard.pricing.update_pricing_modal')
    @include('admin_layout.pages.dashboard.pricing.delete_pricing_modal')
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#pricing_table').DataTable({
        responsive: true,
        "scrollX": true,
        "columnDefs": [
                { "width": "5%", "targets": 0 },
                { "width": "5%", "class": "text-center", "targets": 1 },
                { "width": "5%", "targets": 2 },
                { "width": "5%", "targets": 4 },
                { "width": "5%", "targets": 5 },
                { "width": "5%", "targets": 6 },
                { "width": "5%", "targets": 7 },
                { "width": "15%", "class": "text-center", "targets": 8 },
            ]
        });
    });

    function initImageUpload(box) {
        let uploadField = box.querySelector('.image-upload');

        uploadField.addEventListener('change', getFile);

        function getFile(e){
            let file = e.currentTarget.files[0];
            checkType(file);
        }
  
        function previewImage(file){
            let thumb = box.querySelector('.js--image-preview'),
            reader = new FileReader();

            reader.onload = function() {
                thumb.style.backgroundImage = 'url(' + reader.result + ')';
            }
            reader.readAsDataURL(file);
            thumb.className += ' js--no-default';
        }

        function checkType(file){
            let imageType = /image.*/;
            if (!file.type.match(imageType)) {
                throw 'Datei ist kein Bild';
            } else if (!file){
                throw 'Kein Bild gewählt';
            } else {
                previewImage(file);
            }
        }
  
    }

    // initialize box-scope
    var boxes = document.querySelectorAll('.box');

    for (let i = 0; i < boxes.length; i++) {
        let box = boxes[i];
        initDropEffect(box);
        initImageUpload(box);
    }

    /// drop-effect
    function initDropEffect(box){
        let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
        // get clickable area for drop effect
        area = box.querySelector('.js--image-preview');
        area.addEventListener('click', fireRipple);
  
        function fireRipple(e){
            area = e.currentTarget
            // create drop
            if(!drop){
                drop = document.createElement('span');
                drop.className = 'drop';
                this.appendChild(drop);
            }
            // reset animate class
            drop.className = 'drop';
    
            // calculate dimensions of area (longest side)
            areaWidth = getComputedStyle(this, null).getPropertyValue("width");
            areaHeight = getComputedStyle(this, null).getPropertyValue("height");
            maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

            // set drop dimensions to fill area
            drop.style.width = maxDistance + 'px';
            drop.style.height = maxDistance + 'px';
    
            // calculate dimensions of drop
            dropWidth = getComputedStyle(this, null).getPropertyValue("width");
            dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
            // calculate relative coordinates of click
            // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
            x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
            y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
            // position drop and animate
            drop.style.top = y + 'px';
            drop.style.left = x + 'px';
            drop.className += ' animate';
            e.stopPropagation();
        }
    }

    previewModal = (el) => {
        document.getElementById("img01").src = el.src;
        document.getElementById("modal01").style.display = "block";
    }

    // isActive = (id) => {
    //     console.log(id);
    //     $.ajax({
    //         url: '{{ route('admin.service.isActive') }}',
    //         type: 'get',
    //         dataType: 'json',
    //         data: {id: id, },
    //         success: function (result) {
    //             console.log(result);
    //             if(result.status == 1) {
    //                 toastr.success('Service is active now');
    //             }
    //             else {
    //                 toastr.error('Service is inactive now');
    //             }          
    //         },
    //         error: function (error) {
    //             console.log(error);
    //         }
    //     });
    // }

    getInfo = (item) => {
        console.log(item);
        $('#service_id').val(item.id);
        if(item.service)
        { 
            let html = '<label>Select Service <span class="text-danger">*</span></label><select class="form-control" name="service" required disabled><option value="'+item.service.id+'" selected>'+item.service.name+'</option></select>';
            $('#serviceRow').html(html);
            $('#preview1').css('background-image', 'url(/'+item.image1+')');
            $('#preview2').css('background-image', 'url(/'+item.image2+')');
            $('#pricing_1_name').val(item.pricing_1_name);
            $('#pricing_1_amount').val(item.pricing_1_amount);
            $('#pricing_2_name').val(item.pricing_2_name);
            $('#pricing_2_amount').val(item.pricing_2_amount);
            $('#pricing_3_name').val(item.pricing_3_name);
            $('#pricing_3_amount').val(item.pricing_3_amount);
        }
        else
        {
            let html = '<label>Pricing Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="pricing_name" value="'+item.name+'"/>';
            $('#serviceRow').html(html);
            $('#preview1').css('background-image', 'url(/'+item.image1+')');
            $('#preview2').css('background-image', 'url(/'+item.image2+')');
            $('#pricing_1_name').val(item.pricing_1_name);
            $('#pricing_1_amount').val(item.pricing_1_amount);
            $('#pricing_2_name').val(item.pricing_2_name);
            $('#pricing_2_amount').val(item.pricing_2_amount);
            $('#pricing_3_name').val(item.pricing_3_name);
            $('#pricing_3_amount').val(item.pricing_3_amount);
        }
    }


    getId = (item) => {
        $('#pricing_id').val(item.id);
        $('#service_name').val(item.service.name);
        $('#modalBody').text('Are you sure to remove pricing for '+item.service.name+'');
    }


</script>

@endsection