@extends('admin_layout.layout.admin_master')

@section('content')

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

<div class="container inv my-5 py-2" id="invoiceId">

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

    <div class="row justify-content-between py-3">
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
        <div class="col-sm mr-3">
            <table class="float-right">
                <tbody>
                    <tr>
                        <td>
                            <h3><strong>Invoice details</strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Invoice No</strong></td>
                        <td class="pr-3">:</td>
                        <td>{{ $invoice->invoice_number}}</td>
                    </tr>
                    <tr>
                        <td><strong>Invoice Date</strong></td>
                        <td class="pr-3">:</td>
                        <td>{{ $invoice->invoice_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Due Date</strong></td>
                        <td class="pr-3">:</td>
                        <td>{{ $invoice->due_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Due Amount</strong></td>
                        <td class="pr-3">:</td>
                        <td>
                            @if($invoice->currency == 'us')
                                $ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'euro')
                                € {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'pound')
                                £ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'qr')
                                QR {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'sar')
                                SAR {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'aed')
                                AED {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'cad')
                                CAD {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'ruble')
                                ₽ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'sekel')
                                ₪ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'rupee')
                                ₹ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'yuan')
                                元 {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'yen')
                                ¥ {{ $invoice->due_amount }}
                            @endif
                            @if($invoice->currency == 'aud')
                                AUD {{ $invoice->due_amount }}
                            @endif     
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row ">
        <!-- <div class="col-12"> -->
            <table class="table table-bordered mt-3 mx-3" style="width: 100%; overflow-wrap: anywhere;">
                <thead style="">
                    <tr>
                        <th scope="col">SL. NO</th>
                        <th scope="col">Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">
                    <?php $x = 1?>
                    @foreach($invoice_orders as $order)
                    <tr class="tr">
                        <td style="width: 6%;">{{ $x++ }}</td>
                        <td style="width: 10%;">{{$order->title}}</td>
                        <td>{{$order->description}}</td>
                        <td style="width: 10%;">{{$order->quantity}}</td>
                        <td class="text-nowrap" style="width: 10%;">
                            <?php 
                                $price = $order->price;
                                if(is_float($price) == 1)
                                {
                                    $p = $price;
                                }
                                else
                                {
                                    $p = number_format($price, 2);
                                }
                            ?>

                            @if($invoice->currency == 'us')
                                $ {{ $p }}
                            @endif
                            @if($invoice->currency == 'euro')
                                € {{ $p }}
                            @endif
                            @if($invoice->currency == 'pound')
                                £ {{ $p }}
                            @endif
                            @if($invoice->currency == 'qr')
                                QR {{ $p }}
                            @endif
                            @if($invoice->currency == 'sar')
                                SAR {{ $p }}
                            @endif
                            @if($invoice->currency == 'aed')
                                AED {{ $p }}
                            @endif
                            @if($invoice->currency == 'cad')
                                CAD {{ $p }}
                            @endif
                            @if($invoice->currency == 'ruble')
                                ₽ {{ $p }}
                            @endif
                            @if($invoice->currency == 'sekel')
                                ₪ {{ $p }}
                            @endif
                            @if($invoice->currency == 'rupee')
                                ₹ {{ $p }}
                            @endif
                            @if($invoice->currency == 'yuan')
                                元 {{ $p }}
                            @endif
                            @if($invoice->currency == 'yen')
                                ¥ {{ $p }}
                            @endif
                            @if($invoice->currency == 'aud')
                                AUD {{ $p }}
                            @endif
                        </td>
                        <td style="width: 10%;">
                            @if($invoice->currency == 'us')
                                $ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'euro')
                                € {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'pound')
                                £ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'qr')
                                QR {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'sar')
                                SAR {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'aed')
                                AED {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'cad')
                                CAD {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'ruble')
                                ₽ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'sekel')
                                ₪ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'rupee')
                                ₹ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'yuan')
                                元 {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'yen')
                                ¥ {{$order->amount}}
                            @endif
                            @if($invoice->currency == 'aud')
                                AUD {{$order->amount}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="1" style="background-color: white; text-align: right;">Total</td>
                        <td align="left" style="background-color: white">
                            @if($invoice->currency == 'us')
                                $ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'euro')
                                € {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'pound')
                                £ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'qr')
                                QR {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'sar')
                                SAR {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'aed')
                                AED {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'cad')
                                CAD {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'ruble')
                                ₽ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'sekel')
                                ₪ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'rupee')
                                ₹ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'yuan')
                                元 {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'yen')
                                ¥ {{ $invoice->total_amount }}
                            @endif
                            @if($invoice->currency == 'aud')
                                AUD {{ $invoice->total_amount }}
                            @endif
                        </td>
                    </tr>
                </tfoot>

            </table>
        <!-- </div> -->
    </div>
    <div class="row mt-5 justify-content-between">
        <div class="col-sm">
            <h4 class="ml-3"><strong>Notes</strong></h4>
            <p class="ml-3 text-justify">
                {{ $invoice->note }}
            </p>
        </div>
        <div class="col-sm mr-3 text-right">
            <table align="center" class="w-100">
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
    
</div>

@endsection

@section('script')
@endsection