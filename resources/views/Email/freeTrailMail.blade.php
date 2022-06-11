<h2>Hello Admin,</h2>
You received an Free Order from : {{ $data['name'] }}
<br>
Here are the details:
<br>
<br>

<table>
    <tr style="line-height: 2">
        <td style="font-size: 15px;">
            <strong>Name </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['name'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;">
            <strong>Email </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['email'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;">
            <strong>Phone </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['phone'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Website </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['website'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Country </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['country'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Services </strong></td>
        <td></td>
        <td>:</td>
        <td>
            @foreach($data['service'] as $service)
                <strong>{{ $service . ', ' }}</strong>
            @endforeach
        </td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Image Format </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['image_format'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Background </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['background'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Image 1 </strong></td>
        <td></td>
        <td>:</td>
        <td><a href="{{ url($data['image1']) }}"><strong>image 1</strong></a></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Image 2 </strong></td>
        <td></td>
        <td>:</td>
        <td><a href="{{ url($data['image2']) }}"><strong>image 2</strong></a></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Delivery Time </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['delivery_time'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Path </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['path'] }}</strong></td>
    </tr>
    <tr style="line-height: 2">
        <td style="font-size: 15px;"><strong>Instruction </strong></td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['instruction'] }}</strong></td>
    </tr>
</table>

<br>
<br>
Thank You.
{{-- <b style="font-size:18px;">Name :</b>   {{ $data['name'] }}
<br>
<b style="font-size:18px;">Email :</b> {{ $data['email'] }}
<br>
<b style="font-size:18px;">Phone :</b> {{ $data['phone'] }}
<br>
<b style="font-size:18px;">Website :</b> {{ $data['website'] }}
<br>
<b style="font-size:18px;">Country :</b> {{ $data['country'] }}
<br>
<b style="font-size:18px;">Services :</b>
@foreach($data['service'] as $service)
    {{ $service . ', ' }}
@endforeach
<br>

<b style="font-size:18px;">Image Format :</b> {{ $data['image_format'] }}
<br>
<b style="font-size:18px;">Background :</b> {{ $data['background'] }}
<br>
<b style="font-size:18px;">Image1 : <a href="{{ url('assets/img/freetrail/'.$data['image1']) }}">image1</a></b>
<br>
<b style="font-size:18px;">Image2 : <a href="{{ url('assets/img/freetrail/'.$data['image2']) }}">image2</a></b>
<br>
<b style="font-size:18px;">Delivery Time :</b> {{ $data['delivery_time'] }}
<br>
<b style="font-size:18px;">Path :</b> {{ $data['path'] }}
<br>
<b style="font-size:18px;">Instruction :</b> {{ $data['instruction'] }}
<br> --}}

