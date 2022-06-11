<div class="modal fade" id="acceptModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Accept new order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <h4 class="px-3 pt-2">Are you sure to accept this order???</h4>
            <p class="px-3">Please enter the following fields.</p>
            <form action="{{ route('admin.order.action', ['id'=>$order->id]) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="start_d" name="s_date">
                    <input type="hidden" id="end_d" name="e_date">
                    <input type="hidden" name="status" value="accepted">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Statring Date</label>
                        <input type="datetime-local" class="form-control" id="s_date" placeholder="Enter starting date">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ending date</label>
                        <input type="datetime-local" class="form-control" id="e_date" placeholder="Enter ending date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold" data-dismiss="modal">Close
                    </button>
                    <button type="submit" onclick="gmt()" class="btn btn-success font-weight-bold"><i class="fas fa-check-circle"></i> Accept</button></button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<script>
    function gmt() {
        var start_time = $("#s_date");
        var end_time = $("#e_date");

        var start_time_value = start_time.val()
        var end_time_value = end_time.val()
        var gmt_start_time = new Date(start_time_value).toISOString();
        var gmt_end_time = new Date(end_time_value).toISOString();

        document.getElementById('start_d').value = gmt_start_time;
        document.getElementById('end_d').value = gmt_end_time;

        // var boost_timezone = boost_time_msg.getTimezoneOffset();
        // var boost_time_val = boost_time_msg.getTime();
        // var newtime = boost_time_val - (boost_timezone * 60 * 1000)
        console.log(gmt_start_time)
        console.log(gmt_end_time)
    }
</script>