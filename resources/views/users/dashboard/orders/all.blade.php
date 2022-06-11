@extends('admin_layout.layout.admin_master')



@section('content')
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-folder-open mr-3"></i>
            New Orders
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>SL. numb</th>
                        <th>Client name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Submission Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL. numb</th>
                        <th>Client name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Submission Time</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $x = 1?>
                      @foreach ($orders as $order)
                        <tr>
                          <td>{{ $x++ }}</td>
                          <td>{{ $order->user->name }}</td>
                          <td>{{ $order->user->email }}</td>
                          <td>{{ $order->country }}</td>
                          <td>{{ $order->status }}</td>
                          <td id="c{{ $order->id }}"></td>
                          <td>
                            <div class="btn-gropup">
                                <span data-toggle="tooltip" data-theme="dark" title="Details" class="m-2">
                                  <a href="{{ route('user.order.info', ['id'=>$order->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                </span>
    
                                {{-- <span data-toggle="tooltip" data-theme="dark" title="Accept" class="m-2">
                                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#acceptModal{{ $order->id }}">
                                    <i class="far fa-check-circle"></i>
                                  </button>
                                </span>
                                @include('admin_layout.pages.dashboard.order.accept_modal')

                                <span data-toggle="tooltip" data-theme="dark" title="Reject" class="m-2">
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#rejectModal{{ $order->id }}">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                </span>
                                @include('admin_layout.pages.dashboard.order.reject_modal') --}}
                              </div>
                          </td>
                      @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable({
        "columns": [
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                    ],
        responsive: true,
        "scrollX": true,
        });
    });
</script>

<script>
    let orders_count = {!! json_encode($orders, JSON_HEX_TAG) !!};
    console.log(orders_count.created_at)
  
    orders_count.forEach(element => {
      console.log(element.id)
      console.log(new Date(element.created_at))
      var submit_date = new Date(element.created_at)
      // var submit_date = convertUTCDateToLocalDate(new Date(element.created_at));
      // console.log(submit_date.toLocaleString());
      document.getElementById('c' + element.id).innerText = submit_date.toLocaleString()
    });
  
  
    function convertUTCDateToLocalDate(date) {
      var newDate = new Date(date.getTime()+date.getTimezoneOffset()*60*1000);
  
      var offset = date.getTimezoneOffset() / 60;
      var hours = date.getHours();
  
      newDate.setHours(hours - offset);
  
      return newDate;   
    }
  </script>
</script>

@endsection