<?php


    class DB {
        public $con;
        protected $servername = "localhost";
        protected $username = "root";
        // protected $password = "1234";
        protected $password = "";

        protected $dbname = "clinicbook";

    public function __construct()
    {
        // Kết nối đến cơ sở dữ liệu
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Kiểm tra kết nối
        if ($this->con->connect_error) {
            die("Kết nối thất bại: " . $this->con->connect_error);
        }

        // Thiết lập charset
        $this->con->set_charset("utf8");
    }

    // Phương thức để thực hiện truy vấn
    public function query($query)
    {
        return $this->con->query($query);
    }

    // Phương thức để lấy dữ liệu
    public function fetch($result)
    {
        return $result->fetch_assoc();
    }

    // Phương thức để chuẩn bị truy vấn
    public function prepare($query)
    {
        return $this->con->prepare($query);
    }

    // Phương thức để đóng kết nối
    public function close()
    {
        $this->con->close();
    }
}
