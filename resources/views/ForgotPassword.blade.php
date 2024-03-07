<!DOCTYPE html>
<html>

<head>
    <title>Quên Mật Khẩu</title>

</head>

<body>
    <h1>Quên Mật Khẩu</h1>
    <form method="POST" action="/enter-password">
        @csrf
        <label for="email">Nhập Email :</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @if (isset($message))
            <span>{{ $message }}</span>
        @endif
        <button id="sendOTPButton">Xác Nhận</button>
        <br/><br/>
        <a href="/">Back</a>
    </form>
    
</body>

</html>


