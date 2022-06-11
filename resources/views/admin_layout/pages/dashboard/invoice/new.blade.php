@extends('admin_layout.layout.admin_master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  .select2-container .select2-selection--single .select2-selection__rendered {
    position: relative !important;
    display: block;
    bottom: 6px !important;
    padding-left: 8px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .slogan {
    text-transform: capitalize;
    font-size: initial;
    font-style: italic;
    font-weight: 530;
  }

  .p-title {
    font-size: 23px;
    font-weight: 600;
  }

  .select-month {
    background: beige;
    font-size: 20px;
    font-family: fangsong;
    font-weight: 600;
  }

</style>

<body id="body">
        <div class="container inv my-5 py-2" id="invoiceContainer">
          
          <div class="row justify-content-center">
              <span class="invoice">Invoice</span>
          </div>

            <div class="row">
                <div class="col-sm ml-3">
                    <img src="{{ asset('public/logo.png') }}" alt="" srcset="" style="margin-left: 15px; height: 100px; width: 100px;">
                    <p class="slogan">--To Create perfect</p>
                </div>
                <div class="col-sm mr-3">
                    <!-- <h1 class="font-weight-lighter py-1 px-3">INVOICE</h1> -->
                    <p class="float-right">
                        <span class="p-title">Photo Design Expert</span>  <br>
                        20/4 Pallabi, Mirpur-12 <br>
                        Dhaka 1216, Bangladesh <br>
                        Mobile: 8801740805105 <br>
                        photodesignexpertbd@gmail.com <br>
                        www.photodesignexpert.com
                    </p>
                </div>
            </div>
            <hr>
            <div class="row my-3">
                <div class="col-lg-6">
                  <div id="add_customer_div" class="border border-dark content_center text-center" style="height: 145px; width: 260px;">
                    <span id="add_customer_text">
                      <h3><i class="fas fa-user-plus"></i></h3>
                      <h6>Add a customer</h6>
                    </span>
                    <span id="add_customer_select">
                      <select id="add_customer_id" class="form-control form-select" aria-label="Default select example" name="user" onchange="getOrder()">
                        @foreach ($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </span>
                  </div>
                  
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="float-right">
                                <tbody>
                                    <tr>
                                        <td>Invoice No</td>
                                        <td class="px-3">:</td>
                                        <td>
                                            <input id="invoice_no" onchange="getNumb()" type="text" class="form-control" placeholder="invoice no" value="{{$invoice_number}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Invoice Date</td>
                                        <td class="px-3">:</td>
                                        <td>
                                            <input id="invoice_date" type="text" class="form-control hasDatepicker" onchange="hideDatePicker(this)" placeholder="invoice date">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Due Date</td>
                                        <td class="px-3">:</td>
                                        <td>
                                            <input id="due_date" type="text" class="form-control hasDatepicker" onchange="hideDatePicker(this)" placeholder="due">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Due Amount(USD)</td>
                                        <td class="px-3">:</td>
                                        <td id="i_t_a">
                                          <input class="form-control" type="number" name="due_amount" id="due_amount">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-12 text-center">
                
                <!-- Button trigger modal -->
                <button id="orderBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="getOrder()" disabled>
                  <i class="fas fa-plus"></i>
                  Add Orders
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="container-fluid">
                              <div class="row text-center px-5">
                                <div class="col-4">
                                  <select class="form-control form-input" name="month" id="month">
                                    <option class="select-month" value="" selected>Select Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="13">December</option>
                                  </select>
                                </div>
                                <div class="col-4">
                                  <select class="form-control form-input" name="year" id="year">
                                    <option class="select-month" value="" selected>Select Year</option>
                                    <option value="2018">2020</option>
                                    <option value="2019">2021</option>
                                    <option value="2020">2022</option>
                                    <option value="2021">2023</option>
                                    <option value="2021">2024</option>
                                    <option value="2021">2025</option>
                                  </select>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-2">
                                  <button type="submit" class="btn btn-primary" onclick="getOrderMonthYear()">Submit</button>
                                </div>
                              </div>
                              <div class="row mt-4">
                                <table id="table" class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Sl no./select</th>
                                      <th scope="col">ID</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Service</th>
                                      <th scope="col">Quantity</th>
                                    </tr>
                                  </thead>
                                  <tbody id="order_table_body"></tbody>
                                </table>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn" data-dismiss="modal">Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row ">
                <div class="col-lg-12">
                    <table class="table table-bordered mt-3" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col-2">Items</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="invoice_order" style="background-color: white"></tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: center;">
                                  <button data-toggle="tooltip" title="Add new row" id="add_row" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </td>
                                <td colspan="3" align="right" style="text-align: right">Total Amount:</td>
                                <td id="t_a" width="200">
                                    <input class="form-control" type="number" name="total_amount" id="total_amount">
                                </td>
                            </tr>
                            <tr id="checkGift">
                              <td colspan="4" align="right" class="text-right">Gift Amount:</td>
                              <td id="t_a" width="200">
                                  <input class="form-control" type="number" name="gift_amount" id="gift_amount" oninput="getDueAmount(this.value)">
                                  <small id="giftSmall" class="text-muted"></small>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2"></td>
                              <td colspan="2" class="text-right" align="right">Currency:</td>
                              <td id="">
                                <div class="input-group">
                                  <select class="form-select form-control" aria-label="Default select example" name="currency" id="currency">
                                    <option value="us" selected>US dollar ($)</option>
                                    <option value="euro">Euro (€)</option>
                                    <option value="pound">England Pound (£)</option>
                                    <option value="qr">Qatari riyal (QR)</option>
                                    <option value="sar">Saudi Riyal (SAR)</option>
                                    <option value="aed">United Arab Emirates Dirham (AED)</option>
                                    <option value="aud">Australian dollar (AUD)</option>
                                    <option value="cad">Canadian dollar (CAD)</option>
                                    <option value="ruble">Russian ruble (₽)</option>
                                    <option value="sekel">Israeli shekel (₪)</option>
                                    <option value="rupee">The Indian rupee (₹)</option>
                                    <option value="yuan">Chinese Yuan (元)</option>
                                    <option value="yen">Japanese yen (¥)</option>
                                  </select>
                                </div>
                              </td>
                          </tr>
                        </tfoot>

                    </table>
                </div>
            </div>

            <div class="row mt-4 justify-content-between px-3">
                <div class="col-6">
                    <h4><strong>Notes</strong></h4>
                    <textarea class="form-control" id="note" rows="3">pay us via paypal account and sent our payment on friends & family option. paypal account: clippingpathaptuk@gmail.com</textarea>
                </div>
                <div class="col-6 text-right">
                <table class="w-100">
                    <tr>
                        <td>
                            <h4><strong>Created By</strong></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Officer, Account</p>
                        </td>
                    </tr>
                </table>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-6">
                  <button onclick="getPdf()" id="generateBtn" type="submit" class="btn btn-primary btn-block">Generate</button>
                </div>
            </div>
        </div>

</body>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

  /**
   * initialize datepicker
  */
  datepickerIni = () => {
    $('.hasDatepicker').datepicker({
      format: 'dd-mm-yyyy',
      todayHighlight:'TRUE',
      autoclose: true,
    })
  }


  hideDatePicker = (el) => {
    $(el).datepicker('hide')
  }


  /**
   * Set current date to invoice and due date
  */
  document.addEventListener("DOMContentLoaded", function() {
    disableSubmit()
    datepickerIni()
    var today = new Date();
    var dd = today.getDate();

    var mm = today.getMonth()+1; 
    var yyyy = today.getFullYear();
    if(dd<10) 
    {
        dd='0'+dd;
    } 

    if(mm<10) 
    {
        mm='0'+mm;
    }
    today = dd+'-'+mm+'-'+yyyy;
    console.log(today);
    document.getElementById('invoice_date').value = today;
    document.getElementById('due_date').value = today;
  })
</script>

<script>
  let gift = 0;
  $( document ).ready(function() {
    $('#currency_select').hide();
    $('#checkGift').hide();
  });
  showCurrency = () => {
    $('#currency_icon').hide()
    $('#currency_select').show();
    $('.selectpicker').selectpicker('show');
  }

  let selected = []
  let a = []
  $(document).ready(function() {
          $("#add_customer_div").css('cursor', 'pointer');
          $("#add_customer_select").hide();
          $('#add_customer_div').click(function(){
            $('#add_customer_text').hide()
            $("#add_customer_select").show();
            document.getElementById("orderBtn").disabled = false;
          }); 
      });

  function getOrder() {
    console.log($('#add_customer_id').val())
    let id = $('#add_customer_id').val();
    $.ajax({
                    url: '{{ route('admin.invoice.order') }}',
                    type: 'get',
                    dataType: 'json',
                    data: {id: id},
                    success: function (result) {
                        console.log(result);
                        let html = '';
                        let i = 1;
                        let j = 0;
                        result.orders.forEach(element => {
                          let date = new Date(element.created_at);
                          let id = element.id;
                          html += '<tr>';
                          html += '<td><input class="mr-2" type="checkbox" id="'+id+'"/>'+i+'</td>';
                          html += '<td>'+id+'</td>';
                          html += '<td>'+date.toLocaleString()+'</td>';
                          html += '<td>'+result.order_services[j]+'</td>';
                          html += '<td>'+element.quantity+'</td>';
                          html += '</tr>';
                          i = i + 1;
                          j = j + 1;
                        });
                        $('#order_table_body').html(html);
                        gift = result.profile.gift;
                        if(result.payment_amount > 100)
                        {
                          if(result.profile.gift > 0)
                          {
                            $('#checkGift').show();
                            $('#giftSmall').text('This user has ' + result.profile.gift + ' amount')
                          }
                        }
                        else
                        {
                          $('#checkGift').hide();
                        }
                        // let as = get()
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
                console.log(selected);
  }

  function getOrderMonthYear() {
    let month = ($('#month').val());
    let year = ($('#year').val());
    let id = $('#add_customer_id').val();

    $.ajax({
              url: '{{ route('admin.invoice.order.filter') }}',
              type: 'get',
              dataType: 'json',
              data: { id: id, month: month, year: year },
              success: function (result) {
                console.log(result.filter_orders);
                console.log(result);
                        let html = '';
                        let i = 1;
                        let j = 0;
                        result.filter_orders.forEach(element => {
                          let date = new Date(element.created_at);
                          let id = element.id;
                          html += '<tr id="tr'+id+'">';
                          html += '<td><input class="mr-2 check_box" type="checkbox" id="'+id+'"/>'+i+'</td>';
                          html += '<td>'+id+'</td>';
                          html += '<td>'+date.toLocaleString()+'</td>';
                          html += '<td>'+result.order_services[j]+'</td>';
                          html += '<td>'+element.quantity+'</td>';
                          html += '</tr>';
                          i = i + 1;
                          j = j + 1;
                        });
                        $('#order_table_body').html(html);
                },
                error: function (error) {
                  console.log(error);
                }
              });
  }

  document.getElementById('btn').addEventListener('click', function() {
    let order_id = [];
    $("input:checkbox").each(function() {
        if ($(this).is(":checked")) {
            order_id.push($(this).attr("id"));
        }
    });
    console.log(order_id)
    $.ajax({
              url: '{{ route('admin.invoice.order.get') }}',
              type: 'get',
              dataType: 'json',
              data: { id: order_id },
              success: function (result) {
                console.log(result);
                        let html = '';
                        let i = 1;
                        let j = 0;
                        result.orders.forEach(element => {
                          let date = new Date(element.created_at);
                          var year=date.getFullYear();
                          var month=date.getMonth()+1 //getMonth is zero based;
                          var day=date.getDate();
                          if(month < 10 )
                          {
                            month = '0'+ month;
                          }
                          if(day < 10)
                          {
                            day = '0' + day;
                          }
                          var formatted=day+"-"+month+"-"+year;
                          let id = element.id;
                          html += '<tr class="order-row" id="tr'+i+'">';
                          html += '<td style="width:6%; vertical-align:middle; text-align:center;">'+'<span onclick="remove('+i+')" data-toggle="tooltip" title="remove row" class="btn btn-danger"><i class="fa fa-trash"></i></span>'+'</td>';
                          html += '<td><input class="form-control pr-2 input mb-2 hasDatepicker" type="text" value="'+formatted+'" onchange="hideDatePicker(this)"/> <input class="form-control input" type="text" value="'+result.order_services[j]+'" /></td>';
                          html += '<td style="width:10%"><input id="q'+i+'" oninput="calc('+i+')" class="form-control input" type="number" value="'+element.quantity+'" /></td>';
                          html += '<td style="width:10%"><input id="p'+i+'" oninput="calc('+i+')" class="form-control input" type="number" value="" /></td>';
                          html += '<td style="width:10%"><input id="a'+i+'" oninput="calc('+i+')" class="form-control amount input" type="number" value="" /></td>';
                          html += '</tr>';
                          i = i + 1;
                          j = j + 1;
                        });
                        $('#invoice_order').html(html);
                        datepickerIni()
                        disableSubmit()
                        $("#add_row").removeClass('btn-secondary');
                        $("#add_row").addClass('btn-primary');
                        $("#add_row").prop("disabled",false);
                },
                error: function (error) {
                  console.log(error);
                }
              });
  })
  $('#table').css('cursor', 'pointer')

  let total = [];
  calc = (id) => {
    let quantity = $('#q'+ id).val();
    let price = $('#p'+id).val();
    let amount = quantity * price;
    $('#a'+id).val(parseFloat(amount).toFixed(2));

    let elements = document.querySelectorAll('.amount')
    total = [];
    elements.forEach(element => {
       let am = parseFloat(element.value);
       total.push(am);
    });
    console.log(total)
    let sum = total.reduce((a, b) => a + b, 0)
    $('#total_amount').val(parseFloat(sum).toFixed(2));
    $('#due_amount').val(parseFloat(sum).toFixed(2));
  }

  
  function getPdf() {
    let user_id = $('#add_customer_id').val();
    let invoice_no = $('#invoice_no').val();
    let invoice_date = $('#invoice_date').val();
    let due_date = $('#due_date').val();
    let due_amount = $('#due_amount').val();
    let total_amount = $('#total_amount').val();
    let note = $('#note').val();
    let currency = $('#currency').val();
    let gift = $('#gift_amount').val();

    let inputs = [];
    console.log(document.querySelectorAll('.input'));
    document.querySelectorAll('.input').forEach(element => {
       let i = element.value
       inputs.push(i);
    });
    console.log(inputs)

    $("#overlay").fadeIn(300);

    $.ajax({
              url: '{{ route('admin.invoice.get.invoice') }}',
              type: 'get',
              dataType: 'text',
              data: { user_id: user_id, 
                      invoice_no: invoice_no, 
                      invoice_date: invoice_date, 
                      due_date: due_date, 
                      due_amount: due_amount, 
                      total_amount: total_amount,
                      currency: currency,
                      note: note,
                      inputs: inputs,
                      gift: gift
                    },
              success: function (result) {
                  setTimeout(function(){
                    $("#overlay").fadeOut(300);
                  },500);
                  $('#invoiceContainer').html(result);
                  toastr.success('A new invoice is created');
                  setInterval(() => {
                    window.location.reload
                  }, 500);
                },
                error: function (error) {
                  setTimeout(function(){
                    $("#overlay").fadeOut(300);
                  },500);
                  toastr.error(error);
                  console.log(error);
                }
              });
   }

   $(document).ready(function() {
        $('#add_customer_id').select2();
    });

  // $(document).ready(function() {
  //   let invoices = {!! json_encode($invoices, JSON_HEX_TAG) !!};
  //   console.log(invoices);
  //   });

  getNumb = () => {
    let invoices = {!! json_encode($invoices, JSON_HEX_TAG) !!};
    console.log($('#invoice_no').val())
    let numb = $('#invoice_no').val();
    invoices.forEach(element => {
      if(element.invoice_number == numb)
      {
        alert('The invoice number already exist, please change!!!')
      }
    });
  }

  $( document ).ready(function() {
      $('#add_row').css('cursor', 'pointer');
      $('#add_row').removeClass('btn-primary');
      $('#add_row').addClass('btn-secondary');
      $("#add_row").prop("disabled",true);
      let i = 100;
      let j = 1;
      $('#add_row').click(function() {
        console.log('aaa');
        html = '<tr class="order-row" id="r'+i+'">';
                          html += '<td style="width: 6%; vertical-align: middle; text-align:center;"><span onclick="remove('+i+')" class="btn btn-danger" data-toggle="tooltip" title="remove row"><i class="fa fa-trash"></i></span></td>';
                          html += '<td><input class="form-control pr-2 input hasDatepicker mb-2" type="text" placeholder="Enter order date" onchange="hideDatePicker(this)" required/><input class="form-control input" type="text" value=""  placeholder="Enter services" required/></td>';
                          html += '<td style="width: 10%;"><input id="q'+i+'" oninput="calc('+i+')" class="form-control input" type="number" value="" /></td>';
                          html += '<td style="width: 10%;"><input id="p'+i+'" oninput="calc('+i+')" class="form-control input" type="number" value="" /></td>';
                          html += '<td style="width: 10%;"><input id="a'+i+'" oninput="calc('+i+')" class="form-control amount input" type="number" value="" /></td>';
                          html += '</tr>';
        $('#invoice_order').append(html);
        datepickerIni()
        disableSubmit()
        i++
        j++
      })
  });

  remove = (id) => {
    console.log(id);
    $('#tr'+id).remove();
    $('#r'+id).remove();
    disableSubmit()
    calc(id)
  }

  getDueAmount = (value) => {
    console.log(value);
    console.log(gift);
    let total = $('#total_amount').val();
    if(parseInt(value) > parseInt(gift))
    {
      $('#giftSmall').removeClass('text-muted');
      $('#giftSmall').addClass('text-danger');
      $('#due_amount').val(total)
    }
    else
    {
      if($('#giftSmall').hasClass('text-danger'))
      {
        $('#giftSmall').addClass('text-muted');
        $('#giftSmall').removeClass('text-danger');
      }
      let due = total - value;
      $('#due_amount').val(parseFloat(due).toFixed(2));
    }
  }


  /**
   * disable generate button
  */
  disableSubmit = () => {
    let rows = document.querySelectorAll('.order-row')
    console.log(rows.length);
    if(rows.length <= 0)
    {
      $("#generateBtn").attr("disabled", true);
    }
    else
    {
      $("#generateBtn").attr("disabled", false);
    }
  }
</script>

@endsection



