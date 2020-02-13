<?php
class homeController extends controller
{

    public function __construct()
    {
        parent::__construct();
        $user = new Users();
        if ($user->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
        }
    }

    public function index()
    {
        $dados = array();




        $this->loadTemplate('home', $dados);
    }
}
