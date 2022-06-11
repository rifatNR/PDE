<div class="modal fade" id="rejectModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Reject new free-trial order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <h4 class="px-3 pt-2">Are you sure to reject this order???</h4>
            <p class="px-3">Once done, it can't be undone.</p>
            <form action="{{ route('admin.free-trial.action', ['id'=>$order->id]) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="status" value="rejected">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-danger font-weight-bold"><i class="far fa-times-circle"></i> 
                        Reject
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>