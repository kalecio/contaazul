<?php
class UsersController extends controller
{
    public function __construct()  /*função para importa o banco de dados */
    {
        parent::__construct();
        $user = new UsersModels();
        if ($user->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
            exit;
        }
    }

    public function index()
    {
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();
        if ($user->hasPermission('users_view')) {
            $data['users_list'] = $user->getList($user->getCompany());
            $this->loadTemplate('users', $data);
            // die(var_dump($data));
        } else {
            header("Location:" . BASE_URL);
        }
    }
    /*FUNÇÃO REQUERIDA PARA SALVAR NOVOS USUARIOS NO BANCO*/
    public function add()
    {
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();

        if ($user->hasPermission('users_view')) {
            $p = new PermissionsModels();
            $data['group_list'] = $p->getGroupList($user->getCompany());
            $this->loadTemplate('users_add', $data);
        } else {
            header("Location:" . BASE_URL);
        }
    }
}
