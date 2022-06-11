@extends('admin_layout.layout.admin_master')



@section('content')
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-certificate mr-3"></i>
            {{ $filter }} Free-Trials
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>SL. numb</th>
                        <th>Client name</th>
                        <th>Email</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        {{-- <th>Country</th> --}}
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
                        <th>Image 1</th>
                        <th>Image 2</th>
                        {{-- <th>Country</th> --}}
                        <th>Status</th>
                        <th>Submission Time</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $x = 1?>
                      @foreach ($freetrail as $order)
                        <tr>
                          <td>{{ $x++ }}</td>
                          <td>{{ $order->user->name }}</td>
                          <td>{{ $order->user->email }}</td>
                          <td class="text-center">
                              <img src="{{ asset($order->image_1) }}" alt="" class="img-fluid" data-toggle="modal" data-target="#previewImage" onclick="previewModal(this)" style="height: 40px; width:40px; cursor:pointer;">
                          </td>
                          <td class="text-center">
                              <img src="{{ asset($order->image_2) }}" alt="" class="img-fluid" data-toggle="modal" data-target="#previewImage" onclick="previewModal(this)" style="height: 40px; width:40px; cursor:pointer;">
                          </td>
                          {{-- <td>{{ $order->country }}</td> --}}
                          <td>{{ $order->status }}</td>
                          <td id="c{{ $order->id }}"></td>
                          <td class="text-center">
                            <div class="btn-group">
                                <span data-toggle="tooltip" data-theme="dark" title="Details" class="mr-1">
                                  <a href="{{ route('admin.free-trial.info', ['id'=>$order->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                </span>
    
                                @if($order->status == 'new')
                                    <span data-toggle="tooltip" data-theme="dark" title="Accept" class="mr-1">
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#acceptModal{{ $order->id }}">
                                        <i class="far fa-check-circle"></i>
                                    </button>
                                    </span>
                                    @include('admin_layout.pages.dashboard.free-trial.accept_modal')

                                    <span data-toggle="tooltip" data-theme="dark" title="Reject" class="">
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#rejectModal{{ $order->id }}">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </span>
                                    @include('admin_layout.pages.dashboard.free-trial.reject_modal')
                                @endif
                            </div>
                          </td>
                      @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin_layout.pages.dashboard.portfolio.preview_image_modal')
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
                        { "width": "20%" },
                    ],
        responsive: true,
        "scrollX": true,
        });
    });
</script>

<script>

    let orders_count = {!! json_encode($freetrail, JSON_HEX_TAG) !!};
    console.log(orders_count)
  
    orders_count.forEach(element => {
      console.log(element.id)
      var submit_date = new Date(element.created_at)
      // var submit_date = convertUTCDateToLocalDate(new Date(element.created_at));
      // console.log(submit_date.toLocaleString());
      document.getElementById('c' + element.id).innerText = submit_date.toLocaleString()
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

  previewModal = (el) => {
        document.getElementById("img01").src = el.src;
        document.getElementById("modal01").style.display = "block";
    }
  </script>

@endsection