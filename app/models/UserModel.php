<?php
class UserModel extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE Email = '$email'";
        $result = $this->query($query);
        return $this->fetch($result);
    }
}
  ?>