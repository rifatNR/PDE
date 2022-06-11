@extends('admin_layout.layout.admin_master')

@section('style')
    <link rel="stylesheet" href="{{ asset('d_service/add_service.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .img-size {
            /* -webkit-box-shadow: -2px 4px 9px -2px #000000; */
            /* box-shadow: -2px 4px 9px -2px #000000; */
            width: 450px;
        }

        @media only screen and (max-width: 765px) {
            .img-size {
                /* -webkit-box-shadow: -5px 6px 13px 0px #000000;  */
                /* box-shadow: -2px 4px 9px -2px #000000; */
                width: 450px;
                margin-top: 15px;
            }
        }

        .cross {
            position: absolute;
            right: 38px;
            top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <img class="filter-black nav-icon service-icon mr-2" src="https://img.icons8.com/ios-filled/50/000000/service.png"/>
            {{-- <i class="nav-icon fas fa-globe mr-3"></i> --}}
             Edit Service
        </div>

        <div class="card-body">
            <form action="{{route('admin.service.edit.post', ['id'=>$service->id])}}" method="post" id="service_form" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="formData" id="form-data"> --}}
                <div class="row">
                    <div class="col-sm">
                        <label>Service Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-input" name="service_name" id="service_name" placeholder="Enter the service name" value="{{ $service->name }}" required>
                    </div>
                    <div class="col-sm">
                        <label>Service Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-input" name="service_title" id="service_title" placeholder="Enter service title" value="{{ $service->title }}">
                    </div>
                    <div class="col-sm">
                        <label>Service Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-input" name="service_slug" placeholder="Enter service slug" value="{{ $service->slug }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm">
                        <label>Service Meta tag</label>
                        <textarea class="form-control" name="service_meta" id="service_meta" rows="5">{{$service->meta}}</textarea>
                        <!-- <input type="text" class="form-control form-input" name="service_meta" placeholder="Enter the service meta tag" value="{{ $service->meta }}"> -->
                    </div>
                    <!-- <div class="col-sm">
                        <label>Service Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-input" name="service_slug" placeholder="Enter service slug" value="{{ $service->slug }}" readonly>
                    </div> -->
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-12">
                        <label>Service favicon</label>
                    </div>
                    <div class="col-sm">
                        <input type="file" class="m-top-4" name="service_favicon" id="favicon" onchange="loadFile(this.id)">
                    </div>
                    <div class="col-sm">
                        <img class="img-fluid img-size" id="upload" src="{{ asset($service->favicon) }}" alt="" style="width: 125px">
                    </div>
                </div> -->
                <div class="row mt-3">
                    <div class="col-12 mb-2">
                        <label>Slider images <span class="text-danger">*</span></label>
                    </div>
                    <div class="wrapper1">
                        <div class="box">
                            <div class="js--image-preview" id="slider1" style="background-image: url({{ asset($service->slider->image1) }}) !important"></div>
                            <div class="upload-options">
                                <label>
                                <input type="file" name="slider_image_1" class="image-upload" accept="image/*"/>
                                </label>
                            </div>
                        </div>
                    
                        <div class="box">
                            <div class="js--image-preview" id="slider2" style="background-image: url({{ asset($service->slider->image2) }}) !important"></div>
                            <div class="upload-options">
                                <label>
                                <input type="file" name="slider_image_2" class="image-upload" accept="image/*"/>
                                </label>
                            </div>
                        </div>
                    
                        <div class="box">
                            <div class="js--image-preview" id="slider3" style="background-image: url({{ asset($service->slider->image3) }}) !important"></div>
                            <div class="upload-options">
                                <label>
                                <input type="file" name="slider_image_3" class="image-upload" accept="image/*"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $x= 1; ?>
                @foreach ($service->sections as $section)
                <div class="card mt-3" id="section{{$x}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Section {{ $x }}</h4>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter" id="btn_section{{$x}}" onclick="btnId(this.id)">
                            <i class="far fa-times-circle"></i>
                        </button>
                    </div>
                    <div class="form-group px-3 py-2">
                        <label>Section-{{ $x }} title </label>
                        <input type="text" class="form-control" name="s_{{ $section->id }}_title" id="section_{{ $x }}_title" placeholder="Enter section title" value="{{ $section->title }}" >
                    </div>
                    <div class="form-group px-3 pb-2">
                        <label>Section-{{ $x }} description </label>
                        <textarea class="form-control" name="s_{{ $section->id }}_description" id="section_{{ $x }}_description" rows="5" >{{ $section->description }}</textarea>
                    </div>
                    <div class="row px-3 pb-2">
                        <div class="col-sm">
                            <label>Image Width</label>
                            <input type="number" class="form-control form-input" name="s_{{ $section->id }}_image_width" placeholder="Enter service section image width" value="{{ $section->service_section_image->width }}">
                        </div>
                        <div class="col-sm">
                            <label>Image Height</label>
                            <input type="number" class="form-control form-input" name="s_{{ $section->id }}_image_height" placeholder="Enter service section image height" value="{{ $section->service_section_image->height }}">
                        </div>
                    </div>
                    <div class="row px-3 pb-2">
                        <div class="col-sm">
                            <label>Image caption</label>
                            <input type="text" class="form-control form-input" name="s_{{ $section->id }}_image_caption" placeholder="Enter service section image caption" value="{{ $section->service_section_image->caption }}">
                        </div>
                        <div class="col-sm">
                            <label>Image alt tag</label>
                            <input type="text" class="form-control form-input" name="s_{{ $section->id }}_image_alt" placeholder="Enter service section image alt tag" value="{{ $section->service_section_image->alt_tag }}">
                        </div>
                    </div>
                    <div class="row px-3 pb-2">
                        <div class="col-12">
                            <label>Section-{{ $x }} Image </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input type="file" name="s_{{$section->service_section_image->id}}_image" id="section_{{ $x }}_image" onchange="loadFile(this.id)">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2 text-center" id='s_image_{{$section->service_section_image->id}}'>
                            <img class="img-fluid img-size" id="section_{{ $x }}_image_preview" src="{{asset($section->service_section_image->image)}}" alt="">
                            @if($section->service_section_image->image != null)
                                <i class="fas fa-times-circle cross" onclick="removeImage({{$section->service_section_image->id}})" data-toggle="modal" data-target="#removeSectionImage" style="cursor:pointer;"></i>
                            @endif
                        </div>
                        <input type="hidden" class="form-control form-input" name="s_{{$section->service_section_image->id}}_image_remove" id="section_{{$section->service_section_image->id}}_image_remove" value="">
                    </div>
                    <div class="row px-3 pb-2">
                        <div class="col-12">
                            <label for="">Section-{{ $x }} video url</label>
                            <input type="text" class="form-control form-input" name="s_{{ $section->id }}_video" id="section_{{$x}}_video" value="{{$section->video}}"> 
                        </div>
                    </div>
                </div>
                <?php $x++; ?>
                @endforeach

                <div class="row justify-content-center py-4" id="add_section_btn">
                    <button type="button" class="btn btn-sm btn-primary" onclick="addSection()">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add new section
                    </button>
                </div>

                <input type="hidden" name="last_section" id="last_section">
                
                <div class="row" style="justify-content: flex-end; margin-right: 3px;">
                    <a href="{{route('admin.service.index')}}" class="btn btn-danger mr-2">Cancel</a>
                    <button class="btn btn-info" type="submit">Update</button>
                </div>
            </form>
            
        </div>
    </div>
    @include('admin_layout.pages.dashboard.service.remove_section_modal')
    @include('admin_layout.pages.dashboard.service.remove_section_image_modal')
@endsection

@section('script')

    <script>
        let section;
        removeImage = (x) => {
            console.log(x);
            section = x;
        }

        confirm = () => {
            $('#section_'+ section + '_image_remove').val('Yes');
            $('#s_image_'+ section).hide();
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        //summernote
        let x = 1;
        $(document).ready(function() {
            let sections = {!! json_encode($service->sections, JSON_HEX_TAG) !!};
            for(x=1; x<=sections.length; x++)
            {
                $('#section_'+x+'_description').summernote();
            }
        });

        //slider_image_preview
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

        //section_image_preview
        var loadFile = function(id) {
            $('#section_'+ section + '_image_remove').val('');
            $('#s_image_'+ section).show();
            console.log(id);
            var reader = new FileReader();
            reader.onload = function(){
                if(id == 'favicon')
                {
                    var output = document.getElementById('upload');
                }
                else 
                {
                    var output = document.getElementById(''+id+'_preview');
                }
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        //pass id to modal
        btnId = (id) => {
            let i = $('#modalId').val(id);
            console.log(i);
        }

        //add-section-button
        addSection = () => {
            html = '<div id="section'+x+'" class="card mt-3"><div class="modal-header"><h4 class="modal-title">Section '+x+'</h4><button type="button" class="btn btn-sm btn-danger" id="btn_section'+x+'" data-toggle="modal" data-target="#exampleModalCenter" onclick="btnId(this.id)"><i class="far fa-times-circle"></i></button></div><div class="form-group px-3 py-2"><label>Section-'+x+' title </label><input type="text" class="form-control" name="section_'+x+'_title" id="section_1_title" placeholder="Enter section title" ></div><div class="form-group px-3 pb-2"><label>Section-'+x+' description </label><textarea class="form-control" name="section_'+x+'_description" id="section_'+x+'_description" rows="3" ></textarea></div><div class="row px-3 pb-2"><div class="col-sm"><label>Image Width</label><input type="number" class="form-control form-input" name="section_'+x+'_image_width" placeholder="Enter service section image width"></div><div class="col-sm"><label>Image Height</label><input type="number" class="form-control form-input" name="section_'+x+'_image_height" placeholder="Enter service section image height"></div></div><div class="row px-3 pb-2"><div class="col-sm"><label>Image caption</label><input type="text" class="form-control form-input" name="section_'+x+'_image_caption" placeholder="Enter service section image caption"></div><div class="col-sm"><label>Image alt tag</label><input type="text" class="form-control form-input" name="section_'+x+'_image_alt" placeholder="Enter service section image alt tag"></div></div><div class="row px-3 pb-2"><div class="col-12"><label>Section-'+x+' Image </label></div><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><input type="file" name="section_'+x+'_image" id="section_'+x+'_image" onchange="loadFile(this.id)"></div><div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2 text-center"><img class="img-fluid img-size" id="section_'+x+'_image_preview" src="" alt=""></div></div><div class="row px-3 pb-2"><div class="col-12"><label for="">Section-'+x+' video url</label><input type="text" class="form-control form-input" name="section_'+x+'_video" id="section_'+x+'_video"></div></div></div>'
            let prevElement = $('#add_section_btn').prev(); 
            let el = prevElement.after(html)
            $('#section_'+x+'_description').summernote();
            x++;
        }

        //remove-section
        removeSection = () => {
            let id = $('#modalId').val();
            console.log(id);
            let parent_id = document.getElementById(''+id+'').parentElement.parentElement.id;
            $('#'+parent_id+'').remove();
            // el.style.display = 'hide'
        }

        // last-section
        $( "form" ).on( "submit", function( event ) {
            $('#last_section').val(x);
        });

        //slider old image preview
        $(document).ready(function() {
            let slider = {!! json_encode($service->slider, JSON_HEX_TAG) !!};
            $('#slider1').css('background-image', slider.image1);
            $('#slider2').css('background-image', slider.image2);
            $('#slider3').css('background-image', slider.image3);
        })

    </script>
@endsection