
<h2>Hello Admin,</h2>
You received an Order from : 
<br>
Here are the details:
<br><br>
<table>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;">
            <strong>Name </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['name'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;">
            <strong>Email </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['email'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;">
            <strong>Phone </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['phone'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Website </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['website'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Order ID </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['order_id'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Services </strong></td>
        <td></td>
        <td>:</td>
        <td>
            @foreach($data['service'] as $service)
                <strong>{{ $service . ', ' }}</strong>
            @endforeach
        </td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Country </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['country'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Image Format </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['image_format'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Background </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['background'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Image URL </strong></td>
        <td></td>
        <td>:</td>
        <td><a href="{{ $data['image_url'] }}" target="_blank"><strong>{{ $data['image_url'] }}</strong></a></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Delivery Time </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['delivery_time'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Quantity </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['quantity'] }}</strong></td>
    </tr>
    <tr style="line-height: 2;">
        <td style="font-size: 15px;"><strong>Instruction </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['instruction'] }}</strong></td>
    </tr>
</table>
<br>
<br>
Thank You.
{{-- <b>Name:</b> {{ $data['name'] }}
<br>
<b>Email:</b> {{ $data['email'] }}
<br>
<b>Phone:</b> {{ $data['phone'] }}
<br>
<b>Website:</b> {{ $data['website'] }}
<br>
<b>Order ID:</b> {{ $data['order_id'] }}
<br>
<b>Services:</b>
@foreach($data['service'] as $service)
    {{ $service . ', ' }}
@endforeach
<br> --}}
{{-- <b>Country:</b> {{ $data['country'] }}
<br>
<b>Image Format:</b> {{ $data['image_format'] }}
<br>
<b>Background:</b> {{ $data['background'] }}
<br>
<b>Image Url:</b> <a href="{{ $data['image_url'] }}" target="_blank">{{ $data['image_url'] }}</a>
<br>
<b>Delivery Time:</b> {{ $data['delivery_time'] }}
<br>
<b>Quantity:</b> {{ $data['quantity'] }}
<br>
<b>Instruction:</b> {{ $data['instruction'] }}
<br> --}}

