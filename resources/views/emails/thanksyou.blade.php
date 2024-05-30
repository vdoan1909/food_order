<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn đã đặt hàng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #e7e7e7;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #FF7C08;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .order-details {
            margin: 20px 0;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
        }

        .order-details h2 {
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        .order-details p {
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            color: #ffffff;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    {{-- @dd($order) --}}
    {{-- @dd($bill) --}}
    {{-- @dd($bill_detail) --}}
    {{-- @dd($bill_detail_dishes) --}}
    <div class="container">
        <div class="header">
            <h1>Cảm ơn bạn đã đặt hàng!</h1>
        </div>
        <div class="content">
            <p>Xin chào {{ $user_name }},</p>
            <p>Cảm ơn bạn đã đặt hàng! Chúng tôi đang xử lý đơn hàng của bạn và sẽ thông báo cho bạn khi nó đã được gửi
                đi. Dưới đây là chi tiết đơn hàng của bạn:</p>
            <div class="order-details">
                <h2>Chi tiết đơn hàng</h2>
                <p><strong>Số đơn hàng:</strong> {{ $bill_detail->ma_don_hang }} </p>
                <p><strong>Ngày đặt hàng:</strong> {{ $ngay_mua }} </p>
                <p><strong>Tên người nhận:</strong> {{ $order->ten_nguoi_nhan }}</p>
                <p><strong>Địa chỉ giao hàng:</strong></p>
                <p>{{ $order->dia_chi_nhan }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->sdt_nguoi_nhan }}</p>
                <p><strong>Sản phẩm đã đặt:</strong></p>
                <ul>
                    @if (is_array($bill_detail_dishes))
                        @foreach ($bill_detail_dishes as $item)
                            <li>{{ $item->ten_mon_an }}</li>
                        @endforeach
                    @else
                        <li>{{ $bill_detail_dishes->ten_mon_an }}</li>
                    @endif
                </ul>
                <p><strong>Số lượng:</strong> {{ $bill_detail->so_luong_mua }}</p>
            </div>
            <p>Nếu bạn có bất kỳ câu hỏi nào về đơn hàng, vui lòng liên hệ với đội ngũ hỗ trợ khách hàng của chúng tôi.
            </p>
            {{-- <a href="[URL Website của Bạn]" class="btn">Truy cập Website của Chúng tôi</a> --}}
        </div>
        <div class="footer">
            <p>&copy; 2024 Công ty của Bạn. Mọi quyền được bảo lưu.</p>
            <p>Công ty của Bạn, 123 Đường của Bạn, Thành phố của Bạn, ST, 12345</p>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
