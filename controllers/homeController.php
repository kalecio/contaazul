<?php
class homeController  extends controller
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
        $data = array();
        $user = new Users();
        $user->setLoggedUser();
        $company = new Companies($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();



        $this->loadTemplate('home', $data);
    } 
}
