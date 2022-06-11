<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $user->name }}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    
    table{
        font-size: small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    /* #customers tr:nth-child(even){background-color: #f2f2f2;} */
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #1EA185;
      color: white;
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

    .invoice {
        display: block;
        font-family: "Cooper Black", serif !important;
        background-color: #1EA185 !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 30px;
        padding: 5px 5px 5px 5px !important;
    }

    </style>

</head>
<body>

    <div style="text-align: center; width: 150px !important; margin-left: 280px;">
        <span class="invoice">Invoice</span>
    </div>

    <table width="100%">
    <tr align="left">
        <td align="left">
            <!--<img src="http://www.simpleimageresizer.com/_uploads/photos/517016e8/logo_600x500.png" alt="" srcset="" style="height: 100px !important; width: 100px !important;" id="InvoiceLogo"><br>-->
            <img src="{{ asset('public/logo_600x500.png') }}" alt="" srcset="" style="height: 100px !important; width: 100px !important;" id="InvoiceLogo"><br>
        </td>
        <td align="left" style="margin-left: 320px !important; text-align">
            <pre>
                <span class="p-title">Photo Design Expert</span> 
                20/4 Pallabi, Mirpur-12
                Dhaka 1216, Bangladesh
                Mobile: 8801740805105
                photodesignexpertbd@gmail.com
                www.photodesignexpert.com
            </pre>
        </td>
    </tr>
  </table>
  <hr>

  <table width="100%">
    <tr>
        <td align="left">
            <h3 style="">Invoice to</h3>
            <span style="line-height: 1.5 !important; text-transform: capitalize;">
                <strong>Name</strong> <strong style="margin-right: 5px; margin-left: 10px;">:</strong> {{ $user->name }}
            </span>
             <br>
             <span style="line-height: 1.5 !important;">
                <strong>Email</strong> <strong style="margin-right: 5px; margin-left: 10px;">:</strong> {{ $user->email }}
             </span>
             <br>
             <span style="line-height: 1.5 !important;">
                <strong>Phone</strong> <strong style="margin-right: 5px; margin-left: 5px;">:</strong> {{ $user->phone }}
             </span>
             <br>
        </td>

        <td align="left" style="margin-left: 200px !important">
            <h3 style="">Invoice details</h3>
            <span style="line-height: 1.5 !important;">
                <strong>Invoice Number</strong> <strong style="margin-right:5px">:</strong>{{ $invoice_number }}
            </span>
            <br>
            <span style="line-height: 1.5 !important;">
                <strong>Invoice Date</strong> <strong style="margin-right:5px; margin-left: 23px;">:</strong>{{ $invoice_date }}
            </span>
            <br>
            <span style="line-height: 1.5 !important;">
                <strong>Due Date</strong> <strong style="margin-right:2px; margin-left: 45px;">:</strong> {{ $due_date }}
            </span>
            <br>
            <span style="line-height: 1.5 !important;">
                <strong>Due Amount</strong> <strong style="margin-right:3px; margin-left: 22px;">:</strong>
                    @if($currency == 'us')
                        $ {{ $due_amount }}
                    @endif
                    @if($currency == 'euro')
                        € {{ $due_amount }}
                    @endif
                    @if($currency == 'pound')
                        £ {{ $due_amount }}
                    @endif
                    @if($currency == 'qr')
                        QR {{ $due_amount }}
                    @endif
                    @if($currency == 'sar')
                        SAR {{ $due_amount }}
                    @endif
                    @if($currency == 'aed')
                        AED {{ $due_amount }}
                    @endif
                    @if($currency == 'cad')
                        CAD {{ $due_amount }}
                    @endif
                    @if($currency == 'ruble')
                        ₽ {{ $due_amount }}
                    @endif
                    @if($currency == 'sekel')
                        ₪ {{ $due_amount }}
                    @endif
                    @if($currency == 'rupee')
                        ₹ {{ $due_amount }}
                    @endif
                    @if($currency == 'yuan')
                        元 {{ $due_amount }}
                    @endif
                    @if($currency == 'yen')
                        ¥ {{ $due_amount }}
                    @endif
                    @if($currency == 'aud')
                        AUD {{ $due_amount }}
                    @endif
            </span>
        </td>
    </tr>
  </table>

  <br/>

  <table width="100%" id="customers">
    <thead>
      <tr>
        <th style="width: 6%;">#</th>
        <th style="width: 10%;">Date</th>
        <th style="width: 54%; text-align: center;">Description</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 10%;">Unit Price</th>
        <th style="width: 10%;">Amount</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($invoice_orders))
            <?php $x = 1?>
            @foreach($invoice_orders as $order)
            <tr class="border border-dark tr">
                <td style="width: 6%;">{{ $x++ }}</td>
                <td style="white-space: nowrap; width: 10%;">{{ $order->title }}</td>
                <td style="word-wrap: break-word; text-align: justify">{{ $order->description }}</td>
                <td style="text-align: center; width: 10%;"> {{ $order->quantity }}</td>
                <td style="white-space: nowrap !important; width: 10%;">
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

                    @if($currency == 'us')
                        $ {{ $p }}
                    @endif
                    @if($currency == 'euro')
                        € {{ $p }}
                    @endif
                    @if($currency == 'pound')
                        £ {{ $p }}
                    @endif
                    @if($currency == 'qr')
                        QR {{ $p }}
                    @endif
                    @if($currency == 'sar')
                        SAR {{ $p }}
                    @endif
                    @if($currency == 'aed')
                        AED {{ $p }}
                    @endif
                    @if($currency == 'cad')
                        CAD {{ $p }}
                    @endif
                    @if($currency == 'ruble')
                        ₽ {{ $p }}
                    @endif
                    @if($currency == 'sekel')
                        ₪ {{ $p }}
                    @endif
                    @if($currency == 'rupee')
                        ₹ {{ $p }}
                    @endif
                    @if($currency == 'yuan')
                        元 {{ $p }}
                    @endif
                    @if($currency == 'yen')
                        ¥ {{ $p }}
                    @endif
                    @if($currency == 'aud')
                        AUD {{ $p }}
                    @endif
                    
                </td>
                <td style="white-space: nowrap !important; width: 10%;">
                    @if($currency == 'us')
                        $ {{ $order->amount }}
                    @endif
                    @if($currency == 'euro')
                        € {{ $order->amount }}
                    @endif
                    @if($currency == 'pound')
                        £ {{ $order->amount }}
                    @endif
                    @if($currency == 'qr')
                        QR {{ $order->amount }}
                    @endif
                    @if($currency == 'sar')
                        SAR {{ $order->amount }}
                    @endif
                    @if($currency == 'aed')
                        AED {{ $order->amount }}
                    @endif
                    @if($currency == 'cad')
                        CAD {{ $order->amount }}
                    @endif
                    @if($currency == 'ruble')
                        ₽ {{ $order->amount }}
                    @endif
                    @if($currency == 'sekel')
                        ₪ {{ $order->amount }}
                    @endif
                    @if($currency == 'rupee')
                        ₹ {{ $order->amount }}
                    @endif
                    @if($currency == 'yuan')
                        元 {{ $order->amount }}
                    @endif
                    @if($currency == 'yen')
                        ¥ {{ $order->amount }}
                    @endif
                    @if($currency == 'aud')
                        AUD {{ $order->amount }}
                    @endif
                </td>
            </tr>
            @endforeach
        @endif
        @if(isset($orders))
            <?php $x = 1?>
            @foreach($orders as $order)
            <tr class="border border-dark tr">
                <td>{{ $x++ }}</td>
                @foreach($order as $item)
                    <td class="left">
                        <p>{{ $item }}</p>
                    </td>
                @endforeach
            </tr>
            @endforeach
        @endif
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td align="right" style="text-align: right; font-size: 15px;">Total</td>
            <td align="left" class="gray text-right" style="white-space: nowrap !important; font-size: 15px;">
                 
                    @if($currency == 'us')
                        $ {{ $total_amount }}
                    @endif
                    @if($currency == 'euro')
                        € {{ $total_amount }}
                    @endif
                    @if($currency == 'pound')
                        £ {{ $total_amount }}
                    @endif
                    @if($currency == 'qr')
                        QR {{ $total_amount }}
                    @endif
                    @if($currency == 'sar')
                        SAR {{ $total_amount }}
                    @endif
                    @if($currency == 'aed')
                        AED {{ $total_amount }}
                    @endif
                    @if($currency == 'cad')
                        CAD {{ $total_amount }}
                    @endif
                    @if($currency == 'ruble')
                        ₽ {{ $total_amount }}
                    @endif
                    @if($currency == 'sekel')
                        ₪ {{ $total_amount }}
                    @endif
                    @if($currency == 'rupee')
                        ₹ {{ $total_amount }}
                    @endif
                    @if($currency == 'yuan')
                        元 {{ $total_amount }}
                    @endif
                    @if($currency == 'yen')
                        ¥ {{ $total_amount }}
                    @endif
                    @if($currency == 'aud')
                        AUD {{ $total_amount }}
                    @endif
            </td>
        </tr>
    </tfoot>
  </table>

  <table width="100%" style="margin-top: 30px;">
    <tr>
        <td align="left" style="width: 450px !important; text-align: justify;">
            <h3>Note </h3>
               {{ $note }}
        </td>
		<td align="right">
            <h3 style="margin-left: -20px !important;">Created by </h3>
                Officer, Account
        </td>
    </tr>
  </table>
</body>
</html>