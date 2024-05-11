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
        <h1>Thông báo cập nhật thông tin tài khoản</h1>
        <p>Chào <b>{{ $user_name }}</b>,</p>
        <p>Chúng tôi muốn thông báo rằng thông tin tài khoản của bạn trên [Tên Công Ty hoặc Dịch vụ] đã được cập nhật
            thành công. Dưới đây là thông tin mới của bạn:</p>
        <table>
            <tr>
                <th>Họ tên:</th>
                <td>{{ $user_name }}</td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>{{ $user_phone }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $user_email }}</td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td>{{ $user_address }}</td>
            </tr>
        </table>
        <p>Nếu bạn không thực hiện thay đổi này hoặc nếu bạn cảm thấy thông tin này không chính xác, vui lòng liên hệ
            với chúng tôi ngay lập tức.</p>
    </div>
    <hr>
    <div class="footer">
        <p>Bạn nhận được email này vì đã đăng ký tài khoản với chúng tôi. Nếu bạn không muốn nhận thông báo tương tự,
            vui lòng liên hệ với chúng tôi để hủy đăng ký.</p>
    </div>
</body>

</html>
