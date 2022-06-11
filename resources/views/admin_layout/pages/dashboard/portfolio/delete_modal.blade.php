<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" name="id" id="modalId">
          <h5 class="modal-title" id="exampleModalLongTitle">Remove portfolio image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure to remove this portfolio image???
        </div>
        <div class="modal-footer">
            <form action="{{ route('admin.portfolio.delete') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="portfolio_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Confirm</button>
            </form>
        </div>
      </div>
    </div>
  </div>