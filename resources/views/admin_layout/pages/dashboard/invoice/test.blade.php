<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    body {
        padding: 10px;
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
    
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    
    #customers tr:hover {background-color: #ddd;}
    
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    </style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3>Photo Design Expert</h3>
            <pre>
                20/4 Pallabi, Mirpur-12, Dhaka
                Dhaka, Dhaka 1216
                Bangladesh
                Phone: 8801740805105
                Mobile: 8801740805105
                www.photodesignexpert.com
            </pre>
        </td>
    </tr>
  </table>
  <hr>

  <table width="100%">
    <tr>
        <td align="left">
            <h3 style="border-bottom: thick">Invoice to.</h3>
            {{-- <pre align="left" style="text-align: left"> --}}
                <strong>Name: </strong> Maruf Ahamed <br>
                <strong>Email: </strong> maruf@gmail.com <br>
                <strong>Phone: </strong> 01755678976 <br>
            {{-- </pre> --}}
        </td>
        <td align="right">
            <h3>Invoice details</h3>
            {{-- <pre align="right"> --}}
                <strong>Invoice Number: </strong>INV-123<br>
                <strong>Invoice Date: </strong>22/4/21<br>
                <strong> Due Date: </strong>30/4/21<br>
                <strong>Due Amount: </strong>$231</p>
            {{-- </pre> --}}
        </td>
    </tr>
  </table>

  <br/>

  <table width="100%" id="customers">
    <thead style="background-color: lightgray;">
      <tr>
        <th style="width: 10%;">#</th>
        <th style="width: 20%;">Date</th>
        <th style="width: 40%;">Description</th>
        <th style="width: 10%;">Quantity</th>
        <th style="width: 10%;">Unit Price $</th>
        <th style="width: 10%;">Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">1</td>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <td scope="row">1</td>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <td scope="row">1</td>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        {{-- <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr> --}}
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

  <table width="100%" style="margin-top: 30px;">
    <tr>
        <td align="left">
            <h3>Note: </h3>
            {{-- <pre align="left" style="text-align: left"> --}}
                pay us via paypal account and sent our payment on friends & family option.
                    paypal account: clippingpathaptuk@gmail.com
            {{-- </pre> --}}
        </td>
        <td align="right">
            <h3>Created By: </h3>
            {{-- <pre align="left" style="text-align: left"> --}}
                Officer, Account
            {{-- </pre> --}}
        </td>
    </tr>
  </table>
</body>
</html>