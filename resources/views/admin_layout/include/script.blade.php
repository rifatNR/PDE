<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard2.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
    @elseif(Session::has('info'))
    toastr.info('{{ Session::get('info') }}');
    @elseif(Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
    @elseif(Session::has('errors'))
    toastr.error('{!! implode('', $errors->all('<div>:message</div>')) !!}');
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $( document ).ready(function() {
        $('#orderLink').hide();
        $('#invoiceLink').hide();
        $('#FreeLink').hide();

        if(window.location.href.indexOf("invoice") > -1)
        {
            $('#invoiceLink').toggle();
        }

        if(window.location.href.indexOf("orders") > -1)
        {
            $('#orderLink').toggle();
        }

        if(window.location.href.indexOf("free-trial") > -1)
        {
            $('#FreeLink').toggle();
        }
    });

    toggle = () => {
        let list = document.getElementById('orderLink');
        let icon = document.getElementById('icon');

        if(list.style.display == 'none')
        {
            list.style.display = 'block';
            if(icon.classList.contains("fa-angle-left"))
            {
                $('#icon').removeClass('fa-angle-left').addClass('fa-angle-down');
            }
        }
        else 
        {
            list.style.display = 'none';
            if(icon.classList.contains("fa-angle-down"))
            {
                $('#icon').removeClass('fa-angle-down').addClass('fa-angle-left');
            }
        }
    }

    toggle1 = () => {
        let list = document.getElementById('invoiceLink');
        let icon = document.getElementById('icon1');

        if(list.style.display == 'none')
        {
            list.style.display = 'block';
            if(icon.classList.contains("fa-angle-left"))
            {
                $('#icon1').removeClass('fa-angle-left').addClass('fa-angle-down');
            }
        }
        else 
        {
            list.style.display = 'none';
            if(icon.classList.contains("fa-angle-down"))
            {
                $('#icon1').removeClass('fa-angle-down').addClass('fa-angle-left');
            }
        }
    }

    toggle3 = () => {
        let list = document.getElementById('FreeLink');
        let icon = document.getElementById('icon3');

        if(list.style.display == 'none')
        {
            list.style.display = 'block';
            if(icon.classList.contains("fa-angle-left"))
            {
                $('#icon3').removeClass('fa-angle-left').addClass('fa-angle-down');
            }
        }
        else 
        {
            list.style.display = 'none';
            if(icon.classList.contains("fa-angle-down"))
            {
                $('#icon3').removeClass('fa-angle-down').addClass('fa-angle-left');
            }
        }
    }
</script>

{{-- <script>
    // $(document).ready(function() {
        $("#toggle").click(function() {
            let a = document.getElementById('order');
            if(a.style.display == 'none')
            {
                a.style.display = 'block'
            }
        });

        $("#toggle").click(function() {
            let a = document.getElementById('order');
            let b = document.getElementById('orderLi');
            if(a.style.display == 'block')
            {
                a.style.display = 'none'
                b.classList.remove('menu-is-opening')
                b.classList.remove('menu-open')
            }
        });
    // });
</script> --}}

<script>
    $(document).ready(function() {
        let res = $('#serviceNav').hasClass('active');
        if(res == true)
        {
            $('#serviceImg').addClass('filter-white');
        }
        else 
        {
            if($('#serviceImg').hasClass('filter-white') == true)
            {
                $('#serviceImg').removeClass('filter-white');
                $('#serviceImg').addClass('filter-grey');
            }

            $('.service').hover(function() {
                $('#serviceImg').addClass('filter-white');
                $('#serviceImg').removeClass('filter-grey');
            })

            $('.service').mouseleave(function() {
                $('#serviceImg').addClass('filter-grey');
                $('#serviceImg').removeClass('filter-white');
            })
        }
    })
</script>

<script src="{{ asset('multi-email.js') }}"></script>

<script src="{{ asset('d_service/service.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

