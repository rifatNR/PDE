<!-- Modal -->
<div class="modal fade" id="addPortfolioImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new portfolio image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.portfolio.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Select Service <span class="text-danger">*</span></label>
                        <select class="form-control" id="selectService" name="service" required>
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
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
            </div>
        </div>
    </div>
</div>