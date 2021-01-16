<?php

class InventoryModel extends Model
{


    public function getList($offeset, $id_company)
    {

        $array = [];
        $sql = $this->db->prepare("SELECT *FROM inventory WHERE id_company : id_company  LIMIT $offeset, 10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        try {
            if ($sql->rowCount() > 0) {

                $array = $sql->fetchAll();
            }
        } catch (\Throwable $th) {
            echo "Erro" . $th->getMessage();
        }
        return $array;
    }
}
