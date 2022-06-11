<div class="modal fade" id="addUrlModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add complete work urls
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{{ route('admin.free-trial.upload.link', ['id'=>$order->id]) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="email" id="hiddenEmail">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <div class="form-group email-id-row">
                        <label for="exampleInputEmail1">Client Email address</label>
                           <div class="all-mail">
                               
                           </div>
                           <input type="text" name="" class="form-control enter-mail-id" placeholder="Enter the email id .." />
                           <small class="text-muted">Please hit the spacebar after entering mail address.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Project uplaod URL</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="url" aria-describedby="emailHelp" placeholder="Enter uploaded file url">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="me">
                        <label class="form-check-label" for="exampleCheck1" >Send a copy to myself</label>
                      </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<script>
    let email=[];
    let n = 1;
    $(".enter-mail-id").keydown(function (e) {
        if (e.keyCode == 13 || e.keyCode == 32) {
            var getValue = $(this).val().trim();
            $('.all-mail').append('<span class="email-ids" id="'+n+'">'+ getValue +' <span class="cancel-email" onclick="get('+n+')"><i class="fas fa-times-circle"></i></span></span>');
            email.push(getValue);
            $('#hiddenEmail').val(email)
            $(this).val('');
            n++

            // let emails =  document.querySelectorAll('.email-ids')
            // emails.forEach(element => {
            // // element.click(function(){
            // console.log(element);
        // });
        }
    });

    function get(n) {
        // console.log(n);
        let a = document.getElementById(n).innerText;
        document.getElementById(n).style.display = 'none';
        // console.log(a);
        if(email.includes(a))
        {
            let index = jQuery.inArray(a, email);
            email.splice(index, 1);
        } 
        $('#hiddenEmail').val(email)
        console.log(email);
    }
</script>

{{-- <script>
    $( document ).ready(function() {
        console.log( "ready!" );
        let emails =  document.querySelectorAll('.email-ids')
        emails.forEach(element => {
            // element.click(function(){
            console.log(element);
        });
    });
</script> --}}