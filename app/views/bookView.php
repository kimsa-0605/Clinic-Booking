<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Query -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
session_start();
$jsonData = file_get_contents('php://input');
error_log("Received data: " . $jsonData);


// Kiểm tra xem có phải là yêu cầu POST không
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// Lấy dữ liệu JSON từ body request
$jsonData = file_get_contents('php://input');

// Kiểm tra nếu không có dữ liệu JSON
if (!$jsonData) {
    echo json_encode(['status' => 'error', 'message' => 'No data received.']);
    exit;
}

error_log("Received Raw JSON: " . $jsonData);

if (!mb_check_encoding($jsonData, 'UTF-8')) {
    echo json_encode(['status' => 'error', 'message' => 'Encoding issue with received data.']);
    exit;
}

$data = json_decode($jsonData, true);

// Kiểm tra lỗi giải mã JSON
if ($data === null) {
    echo json_encode(['status' => 'error', 'message' => 'JSON Decode Error', 'error' => json_last_error_msg()]);
    exit;
}

error_log("Decoded Data: " . print_r($data, true));

echo json_encode(['status' => 'success', 'message' => 'Data received successfully', 'data' => $data]);
?>

<script src="/PHP_CLINIC/Clinic-Booking/public/js/schedule.js"></script>
</body>
</html>
