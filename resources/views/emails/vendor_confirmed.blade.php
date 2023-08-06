<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Account Confirm</title>
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
            <td> Your Vendor Email is confirmed. Please login and add your personal, business and bank details
                so that your account will get approved.
            </td>
        </tr>
        <tr>
            <td> Your Vendor Account Details are as below :-</td>
        </tr>
        <tr>
            <td>Name : {{$name}}</td>
        </tr>
        <tr>
            <td>Mobile : {{$mobile}}</td>
        </tr>
        <tr>
            <td>Email : {{$email}}</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td>{{env('APP_NAME')}}</td>
        </tr>
    </table>
</body>
</body>
</html>