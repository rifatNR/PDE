
<!-- Modal -->
<div class="modal fade" id="addPricing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Pricing of service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#infoPanel" role="tab">Service Pricing</a>
                    <li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#ads" role="tab">Custom Pricing</a>
                    <li>
                </ul>

                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">
                        <form action="{{ route('admin.pricing.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Select Service <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectService" name="service" required>
                                    <option value="">Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Images <span class="text-danger">*</span></label>
                                <div class="wrapper1">
                                    <div class="box">
                                      <div class="js--image-preview"></div>
                                      <div class="upload-options">
                                        <label>
                                          <input type="file" class="image-upload" accept="image/*" name="image1"/>
                                        </label>
                                      </div>
                                    </div>
                                  
                                    <div class="box">
                                      <div class="js--image-preview"></div>
                                      <div class="upload-options">
                                        <label>
                                          <input type="file" class="image-upload" accept="image/*" name="image2"/>
                                        </label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Pricing-1 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_1_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-1 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_1_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="">Pricing-2 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_2_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-2 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_2_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="">Pricing-3 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_3_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-3 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_3_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-5 justify-content-end" style="margin-right: 3px;">
                                <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="ads" role="tabpanel">
                        <form action="{{ route('admin.pricing.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Pricing Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pricing_name" id="" required>
                            </div>
                            <div class="form-group">
                                <label>Select Images <span class="text-danger">*</span></label>
                                <div class="wrapper1">
                                    <div class="box">
                                      <div class="js--image-preview"></div>
                                      <div class="upload-options">
                                        <label>
                                          <input type="file" class="image-upload" accept="image/*" name="image1"/>
                                        </label>
                                      </div>
                                    </div>
                                  
                                    <div class="box">
                                      <div class="js--image-preview"></div>
                                      <div class="upload-options">
                                        <label>
                                          <input type="file" class="image-upload" accept="image/*" name="image2"/>
                                        </label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Pricing-1 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_1_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-1 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_1_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="">Pricing-2 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_2_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-2 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_2_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="">Pricing-3 Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pricing_3_name" placeholder="Enter name" required>
                                    {{-- <small class="text-muted"></small> --}}
                                </div>
                                <div class="col">
                                    <label for="">Pricing-3 Amount <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pricing_3_amount" placeholder="Enter amount" step="0.01" required>
                                </div>
                            </div>
                            <div class="row mt-5 justify-content-end" style="margin-right: 3px;">
                                <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>