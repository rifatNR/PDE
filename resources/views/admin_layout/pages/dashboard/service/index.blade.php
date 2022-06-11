@extends('admin_layout.layout.admin_master')

@section('style')
<style>
    table.dataTable tbody td {
        vertical-align: middle;
    }
</style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <img class="filter-black nav-icon service-icon mr-2" src="https://img.icons8.com/ios-filled/50/000000/service.png"/>
                    {{-- <i class="nav-icon fas fa-globe mr-3"></i> --}}
                    Services
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <a href="{{ route('admin.service.add') }}" class="btn btn-primary float-right">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add new
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="service_table" class="table table-striped table-bordered dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>SL. numb</th>
                        <!-- <th>Favicon</th> -->
                        <th>name</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Meta_tag</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL. numb</th>
                        <!-- <th>Favicon</th> -->
                        <th>name</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Meta_tag</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $x = 1?>
                      @foreach ($services as $service)
                        <tr>
                          <td>{{ $x++ }}</td>
                          <!-- <td>
                              <img src="{{ asset($service->favicon) }}" alt="" srcset="" class="img-fluid" style="width: 45px">
                          </td> -->
                          <td>{{ $service->name }}</td>
                          <td>
                              {{ \Illuminate\Support\Str::limit($service->title, 50, $end='...') }}
                            </td>
                          <td>{{ $service->slug }}</td>
                          <td>
                              {{ \Illuminate\Support\Str::limit($service->meta, 20, $end='...') }}
                            </td>
                          <td>{{ $service->created_at }}</td>
                          <td>{{ $service->updated_at }}</td>
                          <td>
                              <div class="btn-group">
                              <span data-toggle="tooltip" data-theme="dark" title="Active/Inactive" id="isActive">
                                    @if($service->status == 1)
                                        <input class="switch" onclick="isActive({{ $service->id }})" type="checkbox" checked />
                                    @else
                                        <input class="switch" onclick="isActive({{ $service->id }})" type="checkbox"/>
                                    @endif
                                </span>
                                <span data-toggle="tooltip" data-theme="dark" title="Edit" class="ml-1">
                                    <a href="{{ route('admin.service.edit', ['id'=>$service->id]) }}" class="btn btn-sm btn-info" style="position: relative; top: 6px">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </a>
                                </span>
                                <span data-toggle="tooltip" data-theme="dark" title="delete" class="ml-2">
                                    <button data-toggle="modal" data-target="#deleteModal" onclick="getId({{ $service->id }})" class="btn btn-sm btn-danger" style="position: relative; top: 6px">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </span>
                              </div>
                          </td>
                      @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin_layout.pages.dashboard.service.delete_modal')
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#service_table').DataTable({
        responsive: true,
        "scrollX": true,
        "columnDefs": [
                { "width": "5%", "targets": 0 },
                { "width": "5%", "targets": 1 },
                { "width": "5%", "targets": 2 },
                { "width": "5%", "targets": 3 },
                { "width": "5%", "targets": 4 },
                { "width": "5%", "targets": 5 },
                { "width": "5%", "targets": 6 },
                { "width": "15%", "class": "text-center", "targets": 7 },
            ]
        });
    });

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    isActive = (id) => {
        console.log(id);
        $.ajax({
        url: '{{ route('admin.service.isActive') }}',
        type: 'get',
        dataType: 'json',
        data: {id: id, },
        success: function (result) {
            console.log(result);
            if(result.status == 1) {
                toastr.success('Service is active now');
            }
            else {
                toastr.error('Service is inactive now');
            }
                  
        },
        error: function (error) {
            console.log(error);
        }
    });
}


    getId = (id) => {
        $('#serviceId').val(id);
    }
</script>

@endsection