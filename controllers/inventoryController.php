<?php

class InventoryController extends Controller
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

        if ($user->hasPermission('inventory_view')) {
            $inventory = new InventoryModel();
            $offset = 0;


            $data['inventory_list'] = $inventory->getList($offset, $user->getCompany());

            $data['add_permission'] = $user->hasPermission('inventory_add');
            $data['edit_permission'] = $user->hasPermission('inventory_edit');
            $this->loadTemplate('inventory', $data);
        } else {

            header("Location:" . BASE_URL);
        }
    }
    public function add()
    {
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();

        if ($user->hasPermission('inventory_add')) {
            $this->loadTemplate('inventory_add', $data);
        }
    }
}
