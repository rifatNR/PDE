
<!-- Modal -->
<div class="modal fade" id="addHeaderTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Header Tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="infoPanel" role="tabpanel">
                        <form action="{{ route('admin.header.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter the name" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Description</label>
                                    <textarea name="desc" id="" cols="10" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="">Content <span class="text-danger">*</span></label>
                                    <textarea name="content" id="" cols="10" rows="6" class="form-control" required></textarea>
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