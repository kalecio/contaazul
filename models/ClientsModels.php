<?php

class ClientsModels extends model
{
    public function getList($offset)
    {
        $array = array(); // array de retorno

        $sql = $this->db->prepare("SELECT * FROM clients "); //LISTAGEM PARA MOSTRAR DE 10 EM 10 CLIENTES

        $sql->execute();

        if ($sql->rowCount() > 0) {

            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function add(
        $id_company,
        $name,
        $email,
        $phone,
        $stars,
        $internal_obs,
        $address_zipcode,
        $address,
        $address_number,
        $address_city,
        $address_state,
        $address_country,
        $address_neighb
    ) {

        $sql = $this->db->prepare("INSERT INTO clients SET 
            id_company = :id_company,
            name  = :name,
            email = :email,
            phone = :phone,
            address = :address,
            address2 = :address2,
            address_number = :address_number,
            address_neighb = :address_neighb
            address_city = :address_city,
            address_state = :address_state,
            address_country = :address_country,
            address_zipcode = :address_zipcode,
            stars = :stars,
            internal_obs = :internal_obs,
           ");
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":address2", $address_neighb);
        $sql->bindValue(":address_number", $address_number);
        $sql->bindValue(":address_neighb", $address_neighb);
        $sql->bindValue(":address_city", $address_city);
        $sql->bindValue(":stars", $stars);
        $sql->bindValue(":internal_obs", $internal_obs);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":address", $address);
/*organizar query, está fora de semantica*/


        $sql->bindValue(":address_city", $address_city);
         $sql->bindValue(":address_country", $address_country);
        $sql->execute();
    }
}
