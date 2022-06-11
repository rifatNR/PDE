<!-- Modal -->
<div class="modal fade" id="updatePricing" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Pricing of service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pricing.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="service_id">
                    <div class="form-group" id="serviceRow">
                    </div>
                    {{-- <div class="form-group" id="pricingName">
                        <label>Pricing Name <span class="text-danger">*</span></label>
                        <input type="text" name="pricing_name" id="pricingN" class="form-control">
                    </div> --}}
                    <div class="form-group">
                        <label>Select Images <span class="text-danger">*</span></label>
                        <div class="wrapper1">
                            <div class="box">
                              <div class="js--image-preview" id="preview1"></div>
                              <div class="upload-options">
                                <label>
                                  <input type="file" class="image-upload" accept="image/*" name="image1"/>
                                </label>
                              </div>
                            </div>
                          
                            <div class="box">
                              <div class="js--image-preview" id="preview2"></div>
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
                            <input type="text" class="form-control" name="pricing_1_name" id="pricing_1_name" placeholder="Enter name" required>
                            {{-- <small class="text-muted"></small> --}}
                        </div>
                        <div class="col">
                            <label for="">Pricing-1 Amount <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="pricing_1_amount" id="pricing_1_amount" placeholder="Enter amount" step="0.01" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Pricing-2 Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pricing_2_name" id="pricing_2_name" placeholder="Enter name" required>
                            {{-- <small class="text-muted"></small> --}}
                        </div>
                        <div class="col">
                            <label for="">Pricing-2 Amount <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="pricing_2_amount" id="pricing_2_amount" placeholder="Enter amount" step="0.01" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Pricing-3 Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="pricing_3_name" id="pricing_3_name" placeholder="Enter name" required>
                            {{-- <small class="text-muted"></small> --}}
                        </div>
                        <div class="col">
                            <label for="">Pricing-3 Amount <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="pricing_3_amount" id="pricing_3_amount" placeholder="Enter amount" step="0.01" required>
                        </div>
                    </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
            </div>
        </div>
    </div>
</div>