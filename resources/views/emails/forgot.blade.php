<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo cập nhật thông tin tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h1,
        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td,
        table th {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Lấy lại mật khẩu</h1>
        <p>Chào <b>{{ $user_name }}</b>,</p>
        <p>Chúng tôi nhận được yêu cầu lấy lại mật khẩu của bạn. Dưới đây là thông tin tài khoản của bạn:</p>
        <table>
            <tr>
                <th>Họ tên:</th>
                <td>{{ $user_name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user_email }}</td>
            </tr>
            <tr>
                <th>Mật khẩu:</th>
                <td>{{ $user_pass }}</td>
            </tr>
        </table>
        <p>Vui lòng sử dụng thông tin này để đăng nhập vào tài khoản của bạn. Nếu bạn không yêu cầu lấy lại mật khẩu,
            hãy bỏ qua email này.</p>
    </div>
    <hr>
    <div class="footer">
        <p>Bạn nhận được email này vì đã đăng ký tài khoản với chúng tôi. Nếu bạn không muốn nhận thông báo tương tự,
            vui lòng liên hệ với chúng tôi để hủy đăng ký.</p>
    </div>
</body>

</html>
