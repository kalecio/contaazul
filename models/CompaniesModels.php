<?php

class CompaniesModels extends Model
{
    private $companyInfo;

    public function __construct($id)
    {
        parent::__construct();
        $sql = $this->db->prepare("SELECT * FROM companies WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        try {
            if ($sql->rowCount() > 0) {
                $this->companyInfo = $sql->fetch();
            }
        } catch (Exception $e){
            echo "Erro ao selecionar as companies".$e->getMessage();
        }

    }

    public function getName()
    {
        if (isset($this->companyInfo['name'])) {
            return $this->companyInfo['name'];
        } else {
            return '';
        }
    }
}
