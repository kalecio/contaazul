<?php
class LoginController extends controller
{
    public function index()
    {
        $data = array();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);
            $user = new UsersModels();
            if ($user->doLogin($email, $pass)) {
                header("Location:" . BASE_URL);
            }
        } else {
            $data['error'] = 'E-mail ou senha estão incorretos';
        }
        $this->loadview('login', $data);
    }
    // public function logout()
    // {
    //     $user = new Users();
    //     $user->setLoggedUser();
    //     if ($user->hasPermission('logout')) {
    //         $user->logout();
    //         header("Location:" . BASE_URL);
    //     } else {
    //         echo "Não pode fazer logout no momento";
    //         exit;
    //     }
    // }
    /* função essa será utilziada cso não necessidte de uma permissão extra para fazer o logout*/
    public function logout()
    {
        $user = new UsersModels();
        $user->logout();
        header("Location:" . BASE_URL);
    }
}
