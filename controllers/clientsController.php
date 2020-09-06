<?php
class ClientsController extends controller
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

        if ($user->hasPermission('clients_view')) {
            $clients = new ClientsModels();

            $offset = 0;
            $data['clients_list'] = $clients->getList($offset);  // FOREACH PASSADO PARA VIEW PARA DAR O RETORNO

            $data['edit_permission'] = $user->hasPermission('clients_edit');  //função verificadora, se o usuário tem permissão de adicionar ou de ver o cliente listado ou criar novo
            $this->loadTemplate('clients', $data);
        //die(var_dump($data));
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

        if ($user->hasPermission('clients_edit')) {
            $clients = new ClientsModels();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $stars = addslashes($_POST['stars']);
                $internal_obs = addslashes($_POST['internal_obs']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);
                $address_country = addslashes($_POST['address_country']);
                $clients->add($user->getCompany(), $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address_neighb, $address_city, $address_state, $address_country);
                header("Location:" . BASE_URL . "/clients");
            }

            /*tentar modificar para os parametros de FILTER_INPUT*/

            /*inclusão de parametros de segurança via ADDSLASHES*/
            $this->loadTemplate('clients_add', $data);
        //die(var_dump($data));
        } else {
            header("Location:" . BASE_URL . "/clients"); // FUNÇÃO DE SEGURANÇA E VERIFICAÇÃO CASO OCORRA QUE ALGUM USUÁRIO QUEIRA ADICIONAR OU CONSULTAR UM CLIENTE, FZENDO ASSIM O RETORNO PARA O MENU INICIAL DO SISTEMA COMO EM EFEITO CASCATA
        }
    }
    public function edit($id)
    {
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $company = new CompaniesModels($user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $user->getEmail();

        if ($user->hasPermission('clients_edit')) {
            $clients = new ClientsModels();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $stars = addslashes($_POST['stars']);
                $internal_obs = addslashes($_POST['internal_obs']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);
                $address_country = addslashes($_POST['address_country']);
                $clients->add($user->getCompany(), $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address_neighb, $address_city, $address_state, $address_country);
                header("Location:" . BASE_URL . "/clients");
            }
            $data['client_info'] = $clients->getInfo($id);

            $this->loadTemplate('clients_edit', $data);
        //die(var_dump($data));
        } else {
            header("Location: ".BASE_URL."/clients");
        }
    }
}
