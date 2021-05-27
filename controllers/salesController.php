<?php

class SalesController extends Controller {

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
        try {
            if ($user->hasPermission('sales_view')) {
                $sales = new SalesModels;
                $offset = 0;
                $data['sales_list'] = $sales->getList($offset, $user->getCompany());
                $this->loadTemplate("sales", $data);
            } else {

                header("Location:" . BASE_URL);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function add() {
        $data = [];
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();
        try {
            if ($user->hasPermission('sales_view')) {
                $sales = new SalesModels;

                $this->loadTemplate("sales_add", $data);
            } else {

                header("Location:" . BASE_URL);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
