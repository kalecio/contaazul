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

    public function add() {
        $data = [];
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();
        try {
            if ($user->hasPermission('inventory_add')) {

                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $i = new InventoryModel();
                    $name = addslashes($_POST['name']);
                    $price = addslashes($_POST['price']);
                    $quant = addslashes($_POST['quant']);
                    $min_quant = addslashes($_POST['min_quant']);
                    $price = str_replace(',', '.', $price);
                    $i->add($name, $price, $quant, $min_quant, $user->getCompany(), $user->getId());
                    header("location: " . BASE_URL . "/inventory");
                }

                $this->loadTemplate('/inventory_add', $data);
            }
        } catch (PDOException $E) {
            echo "Erro ao adicionar" . getMessage();
        }
    }

    public function edit($id) {
        $data = [];
        $u = new UsersModels();
        $u->setLoggedUser();
        $company = new CompaniesModels($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        try {
            if ($u->hasPermission('inventory_edit')) {
                $i = new InventoryModel();

                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $name = addslashes($_POST['name']);
                    $price = addslashes($_POST['price']);
                    $quant = addslashes($_POST['quant']);
                    $min_quant = addslashes($_POST['min_quant']);

                    $price = str_replace('.', '', $price);
                    $price = str_replace(',', '.', $price);

                    $i->edit($id, $name, $price, $quant, $min_quant, $u->getCompany(), $u->getId());

                    header("Location: " . BASE_URL . "/inventory");
                }

                $data['inventory_info'] = $i->getInfo($id, $u->getCompany());

                $this->loadTemplate('inventory_edit', $data);
            }
        } catch (Exception $ex) {
            
        }
    }

    public function delete($id) {

        $user = new UsersModels();
        $user->setLoggedUser();

        try {
            if ($user->hasPermission('inventory_edit')) {
                $i = new InventoryModel();
                $i->delete($id, $user->getCompany(), $user->getId());

                header("location: " . BASE_URL . "/inventory");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
