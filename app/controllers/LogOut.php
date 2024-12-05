<?php
class LogOut extends Controller {

    function show() {  
    }

    function LogOutAccount() {
        if (isset($_POST["logout"])) {
            unset($_SESSION['id-user']);
            session_destroy();
            $this->view('master', [
                'Page' => 'MyAccount',
            ]);
        }
    }
}
