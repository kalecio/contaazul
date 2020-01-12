<?php
class Users extends model
{
    public function isLogged()
    {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }
}
