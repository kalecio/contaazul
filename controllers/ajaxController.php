<?php

class AjaxController extends Controller
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
    }

    public function search_clients()
    {
        $data = array();
        $user = new UsersModels();
        $user->setLoggedUser();
        $clientes = new ClientsModels();

        if (isset($_GET['busca']) && !empty($_GET['busca'])) {

            $busca = addslashes($_GET['busca']);

            $clientesBusca = $clientes->searchClientByname($busca, $user->getCompany());
            foreach ($clientesBusca as $citem) {
                $data[] = array(
                    'name' => $citem['name'],
                    'link' => BASE_URL . '/clients/edit/' . $citem['id']

                );
            }
        }

        echo json_encode($data);
    }
}
