<?php

// Lấy dữ liệu từ form
$username = $_POST['username'] ? $_POST['username'] :  '';
$password = $_POST['password'] ? $_POST['password'] : '';

// Xử lý logic đăng nhập (ví dụ đơn giản)
if ($username === 'user' && $password === 'password') {
    // Đăng nhập thành công
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Đăng nhập thành công!"]);
} else {
    // Đăng nhập thất bại
    http_response_code(401); // Mã lỗi không xác thực
    echo json_encode(["status" => "error", "message" => "Sai tên đăng nhập hoặc mật khẩu."]);
}

