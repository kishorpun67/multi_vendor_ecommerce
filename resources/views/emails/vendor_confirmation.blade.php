<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Account Confirmation</title>
</head>
<body>
    <table>
        <tr>
            <td>Dear {{$name}}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Please Click on below link to confirm your Vendor Account : -</td>
        </tr>
        <tr>
            <td> <a href="{{route('vendor.confirm', $code)}}">{{route('vendor.confirm', $code)}}</a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td>Kishor Pun Magar</td>
        </tr>
    </table>
</body>
</body>
</html>