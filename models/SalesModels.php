<?php

/*
 * @author savio
 */

class SalesModels extends Model {

    public function getList($offset,$id_company) {
        $array = [];

        $sql = $this->db->prepare("SELECT sales.id, sales.date_sale, sales.total_price, sales.status "
                . "FROM sales"
                . "LEFT JOIN client ON clients.id = sales.id_client"
                . "WHERE sales.id_company = :id_company  "
                . "ORDER BY date_sale DESC LIMIT $offset,10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll;
        }

        return $array;
    }

}
