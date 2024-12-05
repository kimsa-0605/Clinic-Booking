<?php

class DB
{
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "1234"; // Thay đổi mật khẩu nếu cần
    private $dbname = "clicnic"; // Chú ý chính tả nếu cần

    public function __construct()
    {
        // Kết nối đến cơ sở dữ liệu
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }

        // Thiết lập charset
        $this->conn->set_charset("utf8");
    }

    // Phương thức để thực hiện truy vấn
    public function query($query)
    {
        return $this->conn->query($query);
    }

    // Phương thức để lấy dữ liệu
    public function fetch($result)
    {
        return $result->fetch_assoc();
    }

    // Phương thức để chuẩn bị truy vấn
    public function prepare($query)
    {
        return $this->conn->prepare($query);
    }

    // Phương thức để đóng kết nối
    public function close()
    {
        $this->conn->close();
    }
}
