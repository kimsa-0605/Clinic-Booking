<?php
class LogOut extends Controller {

    function SayHi() {  
    }

    function LogOutAccount() {
        if (isset($_POST["logout"])) {
            unset($_SESSION['id-user']);
            session_destroy();
            $this->view("MyAccount",[]);
        }
    }
}
