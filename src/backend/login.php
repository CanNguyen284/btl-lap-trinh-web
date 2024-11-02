<?php
session_start();

// Kiểm tra xem có dữ liệu từ form gửi đến không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra đăng nhập (ví dụ với thông tin cứng, bạn có thể thay thế bằng truy vấn cơ sở dữ liệu)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username; // Lưu thông tin người dùng vào session
        header("Location: dashboard.php"); // Chuyển hướng đến trang dashboard
        exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
else {
    echo "không hỗ trợ method này";
}
?>
