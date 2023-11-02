<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    Tài khoản của bạn chưa xác thực, hãy nhập opt đã được gửi về mail để xác thực
    <form method="post" action="/email-verify">
        @csrf
        <input type="text" name=otp>
        @if ($errors->has('email-verify'))
            <p class="text-danger">{{ $errors->first('email-verify') }}</p>
        @endif
        <button>Xác nhận</button>
    </form>
</body>

</html>
