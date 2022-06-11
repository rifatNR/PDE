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
                <i class="nav-icon fas fa-heading border border-dark p-1"></i>
                    Header Tags
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <button data-toggle="modal" data-target="#addHeaderTag" class="btn btn-primary float-right">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add new
                    </button>
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
                        <th>Desc</th>
                        <!-- <th>Created</th>
                        <th>Updated</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SL. numb</th>
                        <!-- <th>Favicon</th> -->
                        <th>name</th>
                        <th>Desc</th>
                        <!-- <th>Created</th>
                        <th>Updated</th> -->
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $x = 1; ?>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ $x++ }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->desc }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <span data-toggle="tooltip" data-theme="dark" title="info" class="mr-2">
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#tagInfo" onclick="getInfo({{$tag}})">
                                        <i class="fas fa-info-circle fa-lg"></i>
                                    </button>
                                </span>
                                <span data-toggle="tooltip" data-theme="dark" title="Edit" class="mr-2">
                                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#tagUpdate" onclick="tagUpdate({{ $tag }})">
                                        <i class="fas fa-edit fa-lg"></i>
                                    </button>
                                </span>
                                <span data-toggle="tooltip" data-theme="dark" title="delete" class="mr-2">
                                    <button data-toggle="modal" data-target="#deleteModal" onclick="getId({{ $tag->id }})" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </span>
                                <span data-toggle="tooltip" data-theme="dark" title="Active/Inactive" id="isActive">
                                    @if($tag->is_active == 1)
                                        <input class="switch" onclick="isActive({{ $tag->id }})" type="checkbox" style="top: 0px !important" checked />
                                    @else
                                        <input class="switch" onclick="isActive({{ $tag->id }})" type="checkbox" style="top: 0px !important"/>
                                    @endif
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin_layout.pages.dashboard.header.add_headertag_modal')
    @include('admin_layout.pages.dashboard.header.info_headertag_modal')
    @include('admin_layout.pages.dashboard.header.update_headertag_modal')
    @include('admin_layout.pages.dashboard.header.delete_headertag_modal')

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
                { "width": "20%", "class": "text-center", "targets": 3 },
            ]
        });
    });

    //getinfo of tag
    getInfo = (tag) => {
        let cr = convertUTCDateToLocalDate(new Date(tag.created_at));
        let up = convertUTCDateToLocalDate(new Date(tag.updated_at));
        console.log(tag);
        $('#name').text(tag.name)
        $('#desc').text(tag.desc)
        $('#cr_at').text(cr.toLocaleDateString())
        $('#up_at').text(up.toLocaleDateString())
        $('#content').text(tag.content);
    }

    //update
    tagUpdate = (tag) => {
        $('#u_id').val(tag.id)
        $('#u_name').val(tag.name)
        $('#u_desc').val(tag.desc)
        $('#u_content').val(tag.content)
    }

    //delete
    getId = (id) => {
        console.log(id);
        $('#d_id').val(id);
    }

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    isActive = (id) => {
        console.log(id);
        $.ajax({
            url: '{{ route('admin.header.isActive') }}',
            type: 'get',
            dataType: 'json',
            data: {id: id, },
            success: function (result) {
                console.log(result);
                if(result == 1) {
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

    function convertUTCDateToLocalDate(date) {
        var newDate = new Date(date.getTime()+date.getTimezoneOffset()*60*1000);

        var offset = date.getTimezoneOffset() / 60;
        var hours = date.getHours();

        newDate.setHours(hours - offset);

        return newDate;   
    }
</script>

@endsection