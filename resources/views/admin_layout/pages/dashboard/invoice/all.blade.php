@extends('admin_layout.layout.admin_master')

@section('style')
<style>
  @media(min-width: 575px) {
    .dataTables_scrollBody{
    overflow: visible !important;
  }
  }
</style>
@endsection

@section('content')

<div class="container" id="invoiceTable">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('admin.invoice.all') }}">All Invoices</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.invoice.inew') }}">New</a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.invoice.overdue') }}">Overdue</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.invoice.draft') }}">Unpaid</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.invoice.paid') }}">Paid</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <table class="table table-striped" id="all" style="width: 100%" id="allInvoiceTable">
            <thead>
              <tr>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Number</th>
                <th scope="col">Customer</th>
                <th scope="col">Total</th>
                <th scope="col">Due</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_invoices as $invoice)
                <tr>
                    <td>
                      @if($invoice->status == 'New')
                        <div class="badge badge-primary">
                          {{ $invoice->status }}
                        </div>
                      @endif
                      @if($invoice->status == 'Draft')
                        <div class="badge badge-warning">
                          Unpaid
                        </div>
                      @endif
                      @if($invoice->status == 'Paid')
                        <div class="badge badge-success">
                          {{ $invoice->status }}
                        </div>
                      @endif
                      @if($invoice->status == 'Overdue')
                        <div class="badge badge-danger">
                          {{ $invoice->status }}
                        </div>
                      @endif
                    </td>
                    <td>
                      {{ \Carbon\Carbon::parse($invoice->created_at)->format('d-M-Y')}}
                    </td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->user->name }}</td>
                    <td>
                      {{ $invoice->total_amount }}
                        @if($invoice->currency == 'us')
                                        dollar ($)
                                    @endif
                                    @if($invoice->currency == 'euro')
                                        Euro (???)
                                    @endif
                                    @if($invoice->currency == 'pound')
                                        Pound (??)
                                    @endif
                                    @if($invoice->currency == 'qr')
                                        QR
                                    @endif
                                    @if($invoice->currency == 'sar')
                                        SAR
                                    @endif
                                    @if($invoice->currency == 'aed')
                                        AED
                                    @endif
                                    @if($invoice->currency == 'cad')
                                        CAD
                                    @endif
                                    @if($invoice->currency == 'ruble')
                                        ruble (???)
                                    @endif
                                    @if($invoice->currency == 'sekel')
                                        shekel (???)
                                    @endif
                                    @if($invoice->currency == 'rupee')
                                        rupee (???)
                                    @endif
                                    @if($invoice->currency == 'yuan')
                                        Yuan (???)
                                    @endif
                                    @if($invoice->currency == 'yen')
                                        yen (??)
                                    @endif
                                    @if($invoice->currency == 'aud')
                                        AUD
                                    @endif
                    </td>
                    <td>
                      {{ $invoice->due_amount }}
                      @if($invoice->currency == 'us')
                                        dollar ($)
                                    @endif
                                    @if($invoice->currency == 'euro')
                                        Euro (???)
                                    @endif
                                    @if($invoice->currency == 'pound')
                                        Pound (??)
                                    @endif
                                    @if($invoice->currency == 'qr')
                                        QR
                                    @endif
                                    @if($invoice->currency == 'sar')
                                        SAR
                                    @endif
                                    @if($invoice->currency == 'aed')
                                        AED
                                    @endif
                                    @if($invoice->currency == 'cad')
                                        CAD
                                    @endif
                                    @if($invoice->currency == 'ruble')
                                        ruble (???)
                                    @endif
                                    @if($invoice->currency == 'sekel')
                                        shekel (???)
                                    @endif
                                    @if($invoice->currency == 'rupee')
                                        rupee (???)
                                    @endif
                                    @if($invoice->currency == 'yuan')
                                        Yuan (???)
                                    @endif
                                    @if($invoice->currency == 'yen')
                                        yen (??)
                                    @endif
                                    @if($invoice->currency == 'aud')
                                        AUD
                                    @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tasks"></i>
                            </button>
                            <div class="dropdown-menu btn btn-sm" aria-labelledby="dropdownMenuButton">
                              @if($invoice->status == 'New')
                              <a class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#approve{{ $invoice->id }}" href="#">Approve</a>
                              <a class="dropdown-item btn btn-sm" href="{{ route('admin.invoice.edit', ['id'=>$invoice->id]) }}">Edit</a>
                              @endif
                              <a class="dropdown-item btn btn-sm" href="{{ route('admin.invoice.view', ['id'=>$invoice->id]) }}">View</a>
                              @if($invoice->status == 'Overdue')
                              <a class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{ $invoice->id }}" href="#">Send Reminder</a>
                              <a class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#addPayment{{ $invoice->id }}" onclick="getId({{ $invoice->id }})" href="#">Record payment</a>
                              @endif
                              @if($invoice->status == 'Draft')
                              <a class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#addPayment{{ $invoice->id }}" onclick="getId({{ $invoice->id }})" href="#">Record payment</a>
                              @endif
                              @if($invoice->status == 'Paid')
                                @if($invoice->due_amount > 0)
                                  <a class="dropdown-item btn btn-sm" data-toggle="modal" data-target="#addPayment{{ $invoice->id }}" onclick="getId({{ $invoice->id }})" href="#">Record payment</a>
                                @endif
                              @endif
                              <a class="dropdown-item btn btn-sm" href="{{ route('admin.invoice.getPdf', ['id'=>$invoice->id]) }}">Export as PDF</a>
                              <a class="dropdown-item btn btn-sm" href="{{ route('admin.invoice.print', ['id'=>$invoice->id]) }}" target="_blank">Print</a>
                              <a class="dropdown-item btn btn-sm" href="#" data-toggle="modal" data-target="#deleteInvoice{{ $invoice->id }}">Delete</a>
                            </div>
                          </div>
                    </td>
                </tr> 

                <!--Delete Invoice Modal -->
                <div class="modal fade" id="deleteInvoice{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="text-">Are you sure to delete this inovice???</p>
                        <div class="container-fluid">
                          <form action="{{route('admin.invoice.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $invoice->id }}">
                            
                        </div>
                      </div>
                  <div class="modal-footer">
                    <div class="row">
                      <button type="button" class="btn btn-outline-primary mr-3" data-dismiss="modal" aria-label="Close">Cancel</button>
                      <button type="Submit" class="btn btn-danger">Confirm</button>
                    </div>
                  </div>
                          </form>
                    </div>
                  </div>
                </div>   

                 {{-- @include('admin_layout.pages.dashboard.invoice.add_payment_modal')  --}}
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
                        <p class="text-muted">Record a payment you???ve already received, such as cash, check, or bank payment.</p>
                        <div class="container-fluid">
                          <form action="{{route('admin.invoice.payment')}}" method="POST" onsubmit="validate(event)">
                            @csrf
                            <input type="hidden" name="id" value="{{ $invoice->id }}">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment date <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="p_date" id="p_p_date" value="" required>
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
                                    <input type="number" name="" id="percentage" class="form-control" oninput="refGift(parseFloat(this.value))">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <input type="number" name="ref_gift" id="ref_gift" class="form-control" readonly>
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

                
                <!--Send Email Modal -->
                <div class="modal fade" id="exampleModalCenter{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Send</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container-fluid">
                              <form action="{{route('admin.invoice.email')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $invoice->id }}">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Email address</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ $invoice->user->email }}">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Subject</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="subject" value="Invoice payment reminder">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Message</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">{{ $invoice->user->name }},&#13;&#10;&#13;&#10;Just a friendly reminder. You have received an invoice that is due on {{ $invoice->due_date }}, and have not yet completed payment. The invoice was issued on {{ $invoice->invoice_date }}.&#13;&#10;Thanks.&#13;&#10;&#13;&#10;Design Expert BD</textarea>
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="me">
                                  <label class="form-check-label" for="exampleCheck1" >Send a copy to myself</label>
                                </div>
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

                <!--Approve Modal -->
                <div class="modal fade" id="approve{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Approve Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container-fluid">
                              <form action="{{ route('admin.invoice.approve', ['id'=>$invoice->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $invoice->id }}">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Email address</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ $invoice->user->email }}">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput">Subject</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="subject" value="Invoice Generated">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Message</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">Dear {{ $invoice->user->name }},&#13;&#10;&#13;&#10;You have a invoice on {{ $invoice->invoice_date }} & due date is {{ $invoice->due_date }} & total amount is {{ $invoice->total_amount }}. Please pay as soon as you can.&#13;&#10;Thanks.&#13;&#10;&#13;&#10;Design Expert BD</textarea>
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="me">
                                  <label class="form-check-label" for="exampleCheck1" >Send a copy to myself</label>
                                </div>
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
              @endforeach
            </tbody>
          </table>
    </div>
  </div>


</div>

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    refGift = (val) => {
      if(val > 0)
      {
        let payment = parseFloat($('#p_amount').val());

        const gift = (val*payment)/100;

        console.log(gift.toFixed(2));
        $('#ref_gift').val(gift.toFixed(2))
      }
      else
      {
        $('#ref_gift').val(0)
      }
    }

        validate = (event) => {
        if($('#p_method').val() == 0)
        {
            event.preventDefault()
            $('#p_method').css('border', '1px solid red');
        }     
    }
</script>

<script>

      document.addEventListener("DOMContentLoaded", function() {
        let date = document.querySelectorAll('#p_p_date');
        date.forEach(element => {
          element.valueAsDate = new Date()
        });
      });

  let id; 
  getId = (id) => {
    id = id
    console.log(id);
  }
  Date.prototype.toDateInputValue = (function() {
      var local = new Date(this);
      local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
      return local.toJSON().slice(0,10);
  });
  document.getElementById(id).value = new Date().toDateInputValue();

    validate = (event) => {
        if($('#p_method').val() == 0)
        {
            event.preventDefault()
            $('#p_method').css('border', '1px solid red');
        }     
    }
</script>

<script>
  
    $(document).ready(function() {
        $('#all').DataTable({
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
        

        $('#overdue').DataTable({
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

        $('#draft').DataTable({
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
@endsection