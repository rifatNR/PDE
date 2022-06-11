@extends('admin_layout.layout.admin_master')

@section('content')
<div class="card">
    <div class="card-header">
        <i class="nav-icon fas fa-users mr-3"></i>
        User Table
    </div>
    <div class="card-body">
        
        <table id="example2" class="table table-striped table-bordered dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>SL. numb</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <!-- <th>Email</th> -->
                    <th>Referral Link</th>
                    <th>Referral Count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SL. numb</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <!-- <th>Email</th> -->
                    <th>Referral Link</th>
                    <th>Referral Count</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $x = 1?>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $x++ }}</td>
                      <td class="text-capitalize">{{ $user->name }}</td>
                      <td>
                          {{ $user->email }} 
                          @if($user->email_verified_at)
                            <p class="badge badge-success">Verified</p>
                          @else
                            <p class="badge badge-danger">Not Verified</p>
                          @endif
                      </td>
                      <td>{{ $user->profile->country_name }}</td>
                      <td>{{ $user->referral_link }}</td>
                      <td>{{ count($user->referrals) }}</td>
                      <td>
                        <div class="btn-group">
                            <span data-toggle="tooltip" data-theme="dark" title="Details" class="m-2">
                              <a href="{{ route('admin.user.info', ['id'=>$user->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                            </span>

                            <span data-toggle="tooltip" data-theme="dark" title="Orders" class="m-2">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nav-icon fas fa-luggage-cart"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('admin.order.new', ['id' => $user->id]) }}">New Orders</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.accepted', ['id' => $user->id]) }}">Accepted Orders</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.rejected', ['id' => $user->id]) }}">Rejected Orders</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.processing', ['id' => $user->id]) }}">Processing Orders</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.qc', ['id' => $user->id]) }}">QC Orders</a>
                                      <a class="dropdown-item" href="{{ route('admin.order.completed', ['id' => $user->id]) }}">Completed Orders</a>
                                    </div>
                                </div>
                            </span>
                            {{-- <span data-toggle="tooltip" data-theme="dark" title="Accept" class="m-2">
                              <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#acceptModal{{ $order->id }}">
                                <i class="far fa-check-circle"></i>
                              </button>
                            </span>
                            @include('admin_layout.pages.dashboard.order.accept_modal') --}}

                            <span data-toggle="tooltip" data-theme="dark" title="delete" class="m-2">
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delUser({{$user->id}})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </span>
                            @include('admin_layout.pages.dashboard.user.delete_modal')
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
$('#example2').DataTable({
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

delUser = (id) => {
    document.getElementById('del_userr_id').value = id;
}
</script>
@endsection
