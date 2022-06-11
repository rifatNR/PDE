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

<div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.dashboard.invoice.all') }}">All Invoices</a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="{{ route('user.dashboard.invoice.new') }}">New</a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('user.dashboard.invoice.overdue') }}">Overdue</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.dashboard.invoice.unpaid') }}">Unpaid</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.dashboard.invoice.paid') }}">Paid</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="menu2" class="container tab-pane active"><br>
        <table class="table table-striped" id="overdue" style="width: 100%">
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
              @foreach ($overdue_invoices as $invoice)
                <tr>
                    <td>
                        <div class="badge badge-danger">
                            {{ $invoice->status }}
                        </div>
                    </td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->user->name }}</td>
                    <td>${{ $invoice->total_amount }}</td>
                    <td>${{ $invoice->due_amount }}</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks"></i>
                        </button>
                        <div class="dropdown-menu btn btn-sm" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item btn btn-sm" href="{{ route('user.dashboard.invoice.view', ['id'=>$invoice->id]) }}">View</a>
                            <a class="dropdown-item btn btn-sm" href="{{ route('user.dashboard.invoice.pdf', ['id'=>$invoice->id]) }}">Export as PDF</a>
                            <a class="dropdown-item btn btn-sm" href="{{ route('user.dashboard.invoice.print', ['id'=>$invoice->id]) }}" target="_blank">Print</a>
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

                 <!--Add Payment Modal -->
                <div class="modal fade" id="addPayment{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                          <form action="{{route('admin.invoice.payment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $invoice->id }}">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment date</label>
                              <input type="date" class="form-control" name="p_date" id="{{ $invoice->id }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Amount</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="number" class="form-control" placeholder='0.00' step="0.01" name="p_amount" value="{{ $invoice->total_amount }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Payment Method</label>
                              <select class="form-select form-control" aria-label="Default select example" name="p_method">
                                <option disabled selected>Select a payment method...</option>
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
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
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
                                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="subject">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Message</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">{{ $invoice->user->name }},&#13;&#10;Just a friendly reminder. You have received an invoice that is due on {{ $invoice->due_date }}, and have not yet completed payment. The invoice was issued on {{ $invoice->invoice_date }}.&#13;&#10;Thanks.&#13;&#10;Design Expert BD
                                  </textarea>
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