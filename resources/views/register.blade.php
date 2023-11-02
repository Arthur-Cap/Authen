<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #registrationForm {
            width: 100%;
            position: relative;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #confirmPasswordError {
            color: red;
        }
        .text-danger{
            color: red
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form id="registrationForm" method="post" action="/register">
            @csrf
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
                @if ($errors->has('username'))
                    <p class="text-danger">{{ $errors->first('username') }}</p>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif

            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Xác nhận mật khẩu:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span id="confirmPasswordError"></span>
            </div>
            <div class="form-group">
                <button id="registerButton" type="submit" disabled>Đăng ký</button>
            </div>
        </form>
    </div>

    <script>
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const registerButton = document.getElementById('registerButton');

        confirmPassword.addEventListener('input', function() {
            if (password.value === confirmPassword.value) {
                confirmPasswordError.textContent = '';
                registerButton.removeAttribute('disabled');
            } else {
                confirmPasswordError.textContent = 'Mật khẩu không trùng khớp';
                registerButton.setAttribute('disabled', 'disabled');
            }
        });

        const registrationForm = document.getElementById('registrationForm');
        registrationForm.addEventListener('submit', function(event) {
            // Xử lý gửi dữ liệu đăng ký tại đây
        });
    </script>
</body>

</html>
