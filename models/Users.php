<?php

class Users extends model {

    public function isLogged() { // CLASSE UTILIZADA PARA SABER SE O USUÁRIO ESTÁ OU NÃO LOGADO
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($email, $password) {

        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['id'];

            return true;
        } else {
            return false;
        }
    }

    public function setLoggedUser() {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
         $id = $_SESSION['ccUser'];
         $
        }
    }
}