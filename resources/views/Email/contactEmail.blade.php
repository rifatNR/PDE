<h2>Hello Admin,</h2>
You received an email from : {{ $data['name'] }}
<br>
Here are the details:
<br><br>

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
            <strong>Subject </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['subject'] }}</strong></td>
    </tr>

    <tr style="line-height: 2">
        <td style="font-size: 15px;">
            <strong>Message </strong>
        </td>
        <td></td>
        <td>:</td>
        <td><strong>{{ $data['message'] }}</strong></td>
    </tr>
</table>

<br>
<br>
Thank You.
