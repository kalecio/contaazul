<?php
class PermissionsController extends controller
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


        if ($user->hasPermission('permissions_view')) {

            $permissions = new PermissionsModels();
            $data['permissions_list'] = $permissions->getList($user->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($user->getCompany());
            $this->loadTemplate('permissions', $data);
            // die(var_dump($data));
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


        if ($user->hasPermission('permissions_view')) {

            $permissions = new PermissionsModels();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $permissions->add($pname, $user->getCompany());
                header("Location: " . BASE_URL . "/permissions");
            }

            $this->loadTemplate('permissions_add', $data);
        } else {
            header("Location:" . BASE_URL);
        }
    }
    public function add_group(){
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();


        if ($user->hasPermission('permissions_view')) {

            $permissions = new PermissionsModels();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $permissions->add($pname, $user->getCompany());
                header("Location: " . BASE_URL . "/permissions");

            }
            $data['permissions_list'] = $permissions->getList($user->getCompany());
            
            $this->loadTemplate('permissions_addgroup', $data);
        } else {
            header("Location:" . BASE_URL);
        }
    }
   




    public function delete($id)
    {

        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();


        if ($user->hasPermission('permissions_group')) {
            $permissions = new PermissionsModels();
            $permissions->delete($id);
            header("Location: " . BASE_URL . "/permissions");
            
        } else {
            header("Location:" . BASE_URL);
        }
    }
    
}
