@extends('admin_layout.layout.admin_master')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
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
    </style>

    <div class="container inv my-5 py-2">
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

        <div class="row py-3">
            <div class="col-sm ml-3">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <h3 style=""><strong>Invoice to</strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td class="pr-3">:</td>
                            <td style: text-transform="capitalize">{{ $invoice->user->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td class="pr-3">:</td>
                            <td>{{ $invoice->user->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>
                            <td class="pr-3">:</td>
                            <td>{{ $invoice->user->phone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm">
                <form action="{{ route('admin.invoice.save', ['id'=>$invoice->id]) }}" method="POST">
                    @csrf

                    <input type="hidden" name="new_orders[]" id="new_orders">

                <div class="row">
                    <div class="col-lg-12">
                        <table class="float-right">
                            <tbody>
                                <tr>
                                    <td>Invoice No</td>
                                    <td class="px-3">:</td>
                                    <td>
                                        <input id="invoice_no" onchange="getNumb()" type="text" class="form-control" name="numb" value="{{$invoice->invoice_number}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Invoice Date</td>
                                    <td class="px-3">:</td>
                                    <td>
                                        <input class="form-control form-input hasDatepicker" type="text" name="invoice_date" value="{{ $invoice->invoice_date }}" onchange="hideDatePicker(this)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Due Date</td>
                                    <td class="px-3">:</td>
                                    <td>
                                        <input class="form-control form-input hasDatepicker" type="text" name="due_date" value="{{ $invoice->due_date }}" onchange="hideDatePicker(this)">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Due Amount(USD)</td>
                                    <td class="px-3">:</td>
                                    <td>
                                        <input class="form-control form-input" id="due_amount" type="number" step="0.01" name="due_amount" value="{{ $invoice->due_amount }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody id="invoice_order" style="background-color: white;">
                        <?php $x = 1?>
                        @foreach($invoice_orders as $order)
                        <tr class="tr order-row" id="tr_{{ $order->id }}">
                            <td style="width: 6%; vertical-align: middle; text-align: center;">
                                <span data-toggle="tooltip" title="remove row" class="btn btn-danger" onclick="remove('tr_', {{ $order->id }})">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </td>
                            <td>
                                <input class="form-control form-input mb-2 hasDatepicker" type="text" name="<?php echo('title'.$order->id) ?>" value="{{$order->title}}" onchange="hideDatePicker(this)">
                                <input class="form-control form-input" type="text" name="<?php echo('description'.$order->id) ?>" value="{{$order->description}}">
                            </td>
                            <td style="width: 10%">
                                <input class="form-control form-input" id="<?php echo('q'.$order->id) ?>" oninput="calc({{$order->id}})" type="number" name="<?php echo('quantity'.$order->id) ?>" value="{{$order->quantity}}">
                            </td>
                            <td style="width: 10%">
                                <input class="form-control form-input" id="<?php echo('p'.$order->id) ?>" oninput="calc({{$order->id}})" type="number" step="0.01" name="<?php echo('price'.$order->id) ?>" value="{{$order->price}}">
                            </td>
                            <td style="width: 10%">
                                <input class="form-control form-input amount" id="<?php echo('a'.$order->id) ?>" oninput="calc({{$order->id}})" type="number" step="0.01" name="<?php echo('amount'.$order->id) ?>" value="{{$order->amount}}">
                            </td>
                        </tr>
                        <?php $x++ ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1" style="text-align:center">
                                <span data-toggle="tooltip" title="Add new row" id="add_row" class="btn btn-success" onclick="addRow()">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </td>
                            <td colspan="3" class="text-right">Total Amount:</td>
                            <td>
                                <input class="form-control form-input" id="total_amount" type="number" step="0.01" name="total_amount" value="{{ $invoice->total_amount }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="3" class="text-right">Curency:</td>
                            <td>
                                <select class="form-select form-control" aria-label="Default select example" name="currency" id="currency">
                                    @if($invoice->currency == 'us')
                                        <option selected>Select currency</option>
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
                                    @elseif($invoice->currency == 'euro')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro" selected>Euro (€)</option>
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
                                    @elseif($invoice->currency == 'pound')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound" selected>England Pound (£)</option>
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
                                    @elseif($invoice->currency == 'qr')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr" selected>Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'sar')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar" selected>Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'aed')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed" selected>United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'aud')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud" selected>Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'cad')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad" selected>Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'ruble')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble" selected>Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'sekel')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel" selected>Israeli shekel (₪)</option>
                                        <option value="rupee">The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'rupee')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
                                        <option value="euro">Euro (€)</option>
                                        <option value="pound">England Pound (£)</option>
                                        <option value="qr">Qatari riyal (QR)</option>
                                        <option value="sar">Saudi Riyal (SAR)</option>
                                        <option value="aed">United Arab Emirates Dirham (AED)</option>
                                        <option value="aud">Australian dollar (AUD)</option>
                                        <option value="cad">Canadian dollar (CAD)</option>
                                        <option value="ruble">Russian ruble (₽)</option>
                                        <option value="sekel">Israeli shekel (₪)</option>
                                        <option value="rupee" selected>The Indian rupee (₹)</option>
                                        <option value="yuan">Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'yuan')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
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
                                        <option value="yuan" selected>Chinese Yuan (元)</option>
                                        <option value="yen">Japanese yen (¥)</option>
                                    @elseif($invoice->currency == 'yen')
                                        <option selected>Select currency</option>
                                        <option value="us">US dollar ($)</option>
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
                                        <option value="yen" selected>Japanese yen (¥)</option>
                                    @endif
                                </select>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
        <div class="row mt-4 justify-content-between px-3">
            <div class="col-6">
                <h4><strong>Notes</strong></h4>
                <textarea class="form-control" id="note" rows="3" name="note">{{ $invoice->note }}</textarea>
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

        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <button type="submit" id="sBtn" class="btn btn-primary btn-block">Save</button>
            </div>
        </div>
        
        </form>
        </div>
        
    </div>

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

        $(document).ready(function() {
            datepickerIni()
        })

        /** 
         * Add row
        */
        let i = 0;
        addRow = () => {
            html = `<tr class="order-row" id="r_${i}">
                        <td style="width: 6%; vertical-align: middle; text-align:center;">
                            <span onclick="remove('r_',${i})" class="btn btn-danger" data-toggle="tooltip" title="remove row">
                                <i class="fa fa-trash"></i>
                            </span>
                        </td>
                        <td>
                            <input class="form-control pr-2 input hasDatepicker mb-2" type="text" placeholder="Enter order date" onchange="hideDatePicker(this)" required />
                            <input class="form-control input" type="text" value=""  placeholder="Enter services" required/>
                        </td>
                        <td style="width: 10%;">
                            <input id="q${i}" oninput="calc(${i})" class="form-control input" type="number" value="" />
                        </td>
                        <td style="width: 10%;">
                            <input id="p${i}" oninput="calc(${i})" class="form-control input" type="number" value="" />
                        </td>
                        <td style="width: 10%;">
                            <input id="a${i}" oninput="calc(${i})" class="form-control amount input" type="number" value="" />
                        </td>
                    </tr>`
            $('#invoice_order').append(html);
            datepickerIni()
            disableSubmit()
            i++
        }

        /**
         * Remove row
        */
        remove = (val,id) => {
            if(val == 'tr_')
            {
                let answer = confirm('Are you sure to remove this row???')
                if(answer)
                {
                    $('#tr_'+id).remove();
                }
            }
            else
            {
                $('#r_'+id).remove();
            }

            calc(id)
            disableSubmit()
        }
    </script>

    <script>
        calc = (id) => {
            let gift = parseInt($('#total_amount').val()) - parseInt($('#due_amount').val());
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
            let due = sum - gift;
            $('#total_amount').val(parseFloat(sum).toFixed(2));
            $('#due_amount').val(parseFloat(due).toFixed(2));
        }
    </script>

    <script>
        getNumb = () => {
            let invoices = {!! json_encode($invoices, JSON_HEX_TAG) !!};
            console.log(invoices);
            let numb = $('#invoice_no').val();
            invoices.forEach(element => {
                if(element.invoice_number == numb)
                {
                    alert('The invoice number already exist, please change!!!')
                }
            });
        }

        $('#sBtn').click(function(event) {
            // event.preventDefault();
            let inputs = []
            document.querySelectorAll('.input').forEach(element => {
            let i = element.value
                inputs.push(i);
            });

            $('#new_orders').val(inputs)
            
            $("#overlay").fadeIn(300);
        })

        /**
        * disable generate button
        */
        disableSubmit = () => {
            let rows = document.querySelectorAll('.order-row')
            console.log(rows.length);
            if(rows.length <= 0)
            {
            $("#sBtn").attr("disabled", true);
            }
            else
            {
            $("#sBtn").attr("disabled", false);
            }
        }
    </script>
@endsection