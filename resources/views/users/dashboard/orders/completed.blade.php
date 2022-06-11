@extends('admin_layout.layout.admin_master')



@section('content')
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-check-double mr-3"></i>
            Completed Orders
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>SL. numb</th>
                        <th>Client name</th>
                        <th>Email</th>
                        <th>Country</th>
                        {{-- <th>Status</th> --}}
                        <th>Submission TIme</th>
                        <th>Updating Time</th>
                        <th>Starting TIme</th>
                        <th>Ending TIme</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL. numb</th>
                        <th>Client name</th>
                        <th>Email</th>
                        <th>Country</th>
                        {{-- <th>Status</th> --}}
                        <th>Submission TIme</th>
                        <th>Updating Time</th>
                        <th>Starting TIme</th>
                        <th>Ending TIme</th>
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
                          {{-- <td>{{ $order->status }}</td> --}}
                          <td id="c{{ $order->id }}"></td>
                          <td id="u{{ $order->id }}"></td>
                          <td id="s{{ $order->id }}"></td>
                          <td id="e{{ $order->id }}"></td>
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
    console.log(orders_count)
  
    orders_count.forEach(element => {
      console.log(element.id)
      var start_date = convertUTCDateToLocalDate(new Date(element.starting_date));
      var end_date = convertUTCDateToLocalDate(new Date(element.ending_date));
      var submit_date = new Date(element.created_at)
      var update_date = new Date(element.updated_at);
      console.log(start_date.toLocaleString());
      console.log(end_date.toLocaleString());
      console.log(submit_date.toLocaleString());
      console.log(update_date.toLocaleString());
      document.getElementById('s' + element.id).innerText = start_date.toLocaleString()
      document.getElementById('e' + element.id).innerText = end_date.toLocaleString()
      document.getElementById('c' + element.id).innerText = submit_date.toLocaleString()
      document.getElementById('u' + element.id).innerText = update_date.toLocaleString()
    });
  
    // let a = document.getElementById('h_start').value;
    // var date = convertUTCDateToLocalDate(new Date(a));
    // console.log(date.toLocaleString());
  
  
    function convertUTCDateToLocalDate(date) {
      var newDate = new Date(date.getTime()+date.getTimezoneOffset()*60*1000);
  
      var offset = date.getTimezoneOffset() / 60;
      var hours = date.getHours();
  
      newDate.setHours(hours - offset);
  
      return newDate;   
  }
</script>

@endsection