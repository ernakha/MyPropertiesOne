<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>
</head>

<body>
    <form action="{{route('verify.otp')}}" method="POST">
        @csrf
        <label for="phone">Masukkan Nomor Telepon:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="otp">Masukkan OTP:</label>
        <input type="text" id="otp" name="otp" required>

        <button type="submit">Verifikasi OTP</button>
    </form>
</body>

</html>