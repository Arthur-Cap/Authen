<!DOCTYPE html>
<html>

<head>
    <title>Xác Nhận OTP</title>

</head>

<body>
    <h1>Xác Nhận OTP</h1>
    <form method="POST" action="/forgot-password">
        @csrf <!-- Thêm token CSRF của Laravel -->


        @if (isset($message))
            <span>{{ $message }}</span>
        @endif


        <span id="timer" style="display: none;"></span><br>

        <label for="otpInput">Nhập Mã OTP:</label>
        <input type="text" id="otpInput" name="otpInput" oninput="checkOTP()" maxlength="6">
        @if ($errors->has('otpInput'))
            <span class="error">{{ $errors->first('otpInput') }}</span>
        @endif

        <button id="confirmButton" name="confirmButton" >Xác Nhận</button>
    </form>
</body>

</html>
