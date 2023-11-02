<!DOCTYPE html>
<html>

<head>
    <title>Nhập mật khẩu mới</title>

</head>

<body>
    <h1>Nhập mật khẩu mới</h1>
    <form method="POST" action="/forgot-password-otp">
        @csrf
        <label for="pass">Mật khẩu :</label>
        <input type="text" id="pass" name="pass"  required>
        @if (isset($message))
            <span>{{ $message }}</span>
        @endif
        <button id="sendOTPButton">Xác Nhận</button>
    </form>
    
</body>

</html>


