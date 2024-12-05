<?php
class MiddleWare extends Controller{
    public static function isSignedIn() {
        if (!isset($_SESSION['id-user'])|| !isset($_SESSION['LogIn-time'])) {
            return false;
        }

        $currentTime = time();
        if ($currentTime - $_SESSION['LogIn-time'] > 5 * 24 * 60 * 60) {
            unset($_SESSION['id-user']);
            session_destroy();
            return false;
        }
        return true;
    }
}