<?php

class inventoryController extends Controller {

    public function __construct() /* função para importa o banco de dados */ {
        parent::__construct();
        $user = new UsersModels();
        if ($user->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
            exit;
        }
    }

    public function index() {
        $data = [];
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();

        if ($user->hasPermission('sales_view')) {
            
            $this->loadTemplate('sales', $data);
        } else {

            header("Location:" . BASE_URL);
        }
    }

}