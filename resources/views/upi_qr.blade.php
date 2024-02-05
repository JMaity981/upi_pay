<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI QR</title>
</head>
<body>
    <h2>AMOUNT = <?=$am?></h2>
    <h3>TN = <?=$tn?></h3>
    {{$svgQRCode}}<br>
    <a href="{{$upiLink}}">Pay using UPI</a>
</body>
</html>