<!--Add Payment Modal -->
<div class="modal fade" id="addPayment{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Record Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-muted">Record a payment you’ve already received, such as cash, check, or bank payment.</p>
                        <div class="container-fluid">
                          <form action="{{route('admin.invoice.payment')}}" method="POST" onsubmit="validate(event)">
                            @csrf
                            <input type="hidden" name="id" value="{{ $invoice->id }}">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment date <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="p_date" id="p_date" value="" required>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Amount <span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="number" class="form-control" placeholder='0.00' step="0.01" name="p_amount" id="p_amount" value="{{ $invoice->due_amount }}" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment Method <span class="text-danger">*</span></label>
                              <select class="form-select form-control" aria-label="Default select example" name="p_method" id="p_method" required>
                                <option value= "0">Select a payment method...</option>
                                <option value="1">Bank Payment</option>
                                <option value="2">Cash</option>
                                <option value="3">Check</option>
                                <option value="4">Credit Card</option>
                                <option value="5">PayPal</option>
                                <option value="6">Other</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment Account</label>
                              <select class="form-select form-control" aria-label="Default select example" name="p_account">
                                <option disabled selected>Select a payment account...</option>
                                <option value="1">Cash On Hand (USD)</option>
                                <option value="2">Owner Investment / Drawings (USD)</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Memo / Notes</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note" required></textarea>
                            </div>

                            @if($invoice->user->referrer)
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Referrer gift</label>
                            </div>
                            <div class="row" style="margin-top: -17px">
                                <div class="col-sm input-group">
                                    <input type="text" name="" id="percentage" class="form-control" oninput="refGift(parseFloat(this.value))">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <input type="text" name="ref_gift" id="ref_gift" class="form-control">
                                </div>
                            </div>
                            @endif
                      </div>
                  </div>
                  <div class="modal-footer">
                    <div class="row">
                      <button type="button" class="btn btn-outline-primary mr-3" data-dismiss="modal" aria-label="Close">Cancel</button>
                      <button type="Submit" class="btn btn-success">Confirm</button>
                    </div>
                  </div>
                          </form>
                    </div>
                  </div>
</div>  


<script>
    

    refGift = (val) => {
        let payment = parseFloat($('#p_amount').val());

        const gift = (val*payment)/100;

        console.log(gift.toFixed(2));
        $('#ref_gift').val(gift.toFixed(2))
    }

    validate = (event) => {
        if($('#p_method').val() == 0)
        {
            event.preventDefault()
            $('#p_method').css('border', '1px solid red');
        }     
    }
</script>