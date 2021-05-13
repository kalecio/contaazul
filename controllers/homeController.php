<?php

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();
        $user = new UsersModels();
        if ($user->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
        }
    }

    public function index() {
        $data = [];
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();

        $this->loadTemplate('home', $data);
    }

}
