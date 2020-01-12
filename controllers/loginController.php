<?php
class loginController extends controller
{
    public function index()
    {
        $data = array();
        $this->loadView('login', $data);
    }
}
