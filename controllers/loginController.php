<?php /*CONTROLLER DA TELA INICIAL DE LOGIN, VERIFICAÇÃO DOS DADOS INICAIS SE ESTÃO CADASTRADOS NO BANCOS*/
class loginController extends controller
{
    public function index()
    {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);
            $u = new Users();
            if ($u->doLogin($email, $pass)) {
                header("Location:" . BASE_URL);
                exit;
            } else {
                $data['error'] = 'E-mail ou Senha estão errados';
            }
        }
        $data = array();
        $this->loadView('login', $data);
    }
}
