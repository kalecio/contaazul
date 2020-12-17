<?php

class ClientsModels extends Model
{
    public function getList($offset, $id_company)
    {
        $array = array(); // array de retorno

        $sql = $this->db->prepare("SELECT * FROM clients WHERE id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getInfo($id, $id_company)
    {        // função e busca e segurança para não apagar nenhum usuário que não seja o correto
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM clients WHERE id = :id AND id_company  = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function getCount($id_company)
    {
        $r = 0;
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM clients WHERE id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();
        $r = $row['c'];

        return $r;
    }
    public function add($id_company, $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address_neighb, $address_city, $address_state, $address_country)
    {
        $sql = $this->db->prepare("INSERT INTO clients SET 
            id_company = :id_company,
            name  = :name,
            email = :email,
            phone = :phone,
            address = :address,
            address2 = :address2,
            address_number = :address_number,
            address_neighb = :address_neighb,
            address_city = :address_city,
            address_state = :address_state,
            address_country = :address_country,
            address_zipcode = :address_zipcode,
            stars = :stars,
            internal_obs = :internal_obs
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
        $sql->bindValue(":address_state", $address_state);
        $sql->bindValue(":address_country", $address_country);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":stars", $stars);
        $sql->bindValue(":internal_obs", $internal_obs);
        $sql->execute();
        // echo "<pre>";
        // var_dump($id_company, $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address_neighb, $address_city, $address_state, $address_country);
        // echo "</pre>";
        // die();
    }


    public function edit($id, $id_company, $name, $email, $phone, $stars, $internal_obs, $address_zipcode, $address, $address_number, $address_neighb, $address_city, $address_state, $address_country)
    {
        $sql = $this->db->prepare("UPDATE  clients SET 
            id_company = :id_company,
            name  = :name,
            email = :email,
            phone = :phone,
            address = :address,
            address2 = :address2,
            address_number = :address_number,
            address_neighb = :address_neighb,
            address_city = :address_city,
            address_state = :address_state,
            address_country = :address_country,
            address_zipcode = :address_zipcode,
            stars = :stars,
            internal_obs = :internal_obs WHERE id = :id AND :id_company = :id_company2
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
        $sql->bindValue(":address_state", $address_state);
        $sql->bindValue(":address_country", $address_country);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":stars", $stars);
        $sql->bindValue(":internal_obs", $internal_obs);
        $sql->bindValue(':id', $id);
        $sql->bindValue(":id_company2", $id_company);
        $sql->execute();
    }
}
