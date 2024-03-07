<!DOCTYPE html>
<html>

<head>
    <title>Đổi Email Tài Khoản</title>

</head>

<body>
    <h1>Đổi Email Tài Khoản</h1>
    <form method="POST" action="/generate-change-email-otp">
        @csrf
        @if (isset($message))
            <span>{{ $message }}</span> <br/><br/>
        @endif
        <label for="newEmail">Nhập Email Mới:</label>
        
        <input type="email" id="newEmail" name="newEmail" value="{{ old('newEmail') }}" required>
        
        <button id="sendOTPButton">Gửi OTP</button>

        <br/><br/>
        <a href="/">Back</a>
    </form>

    <script>
        let timer;

        function enableSendOTPButton() {
            document.getElementById("sendOTPButton").disabled = false;
            document.getElementById("timer").style.display = "none";
        }

        function disableSendOTPButton() {
            document.getElementById("sendOTPButton").disabled = true;
            document.getElementById("timer").style.display = "block";
        }

        function updateTimer(seconds) {
            document.getElementById("timer").innerHTML = "Thời gian còn lại: " + seconds + " giây";
        }

        function checkOTP() {

            const otpInput = document.getElementById("otpInput").value;
            if (otpInput.length === 6) {
                document.getElementById("confirmButton").disabled = false;
            } else {
                document.getElementById("confirmButton").disabled = true;
            }
        }
    </script>
