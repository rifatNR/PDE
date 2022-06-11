<div class="modal fade" id="statusUpdateModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Update Free-trial Status
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <h4 class="px-3 pt-2">Are you sure to update order status to next ???</h4>
            <p class="px-3">Once done, it can't be undone.</p>
            <form action="{{ route('admin.free-trial.status.update', ['id'=>$order->id]) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @if($order->status == 'rejected')
                        <input type="hidden" name="status" value="new">
                    @endif
                    @if($order->status == 'accepted')
                        <input type="hidden" name="status" value="processing">
                    @endif
                    @if($order->status == 'processing')
                        <input type="hidden" name="status" value="QC">
                    @endif
                    @if($order->status == 'QC')
                        <input type="hidden" name="status" value="completed">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-success font-weight-bold"><i class="fas fa-check-circle"></i> 
                        Confirm
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>