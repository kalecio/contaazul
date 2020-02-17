<?php
class PermissionsController extends controller
{
    public function __construct()  /*função para importa o banco de dados */
    {
        parent::__construct();
        $user = new Users();
        if ($user->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
            exit;
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

        $this->loadTemplate('permissions', $data);
    }
}
