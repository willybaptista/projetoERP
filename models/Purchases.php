<?php

class Purchases extends model {
    
    public function addPurchase($id_company,$id_user,$date_purchase,$total_price){
        
        $sql = "INSERT INTO purchases(id_company,id_user,data_purchase,total_price)"
                . " VALUES(:id_company,:id_user,:data_purchase,:total_price)";
        $sql->$this->db->prepare($sql);
        $sql->bindValue(":id_company",$id_company);
        $sql->bindValue(":id_user",$id_user);
        $sql->bindValue(":date_purchase",$date_purchase);
        $sql->bindValue(":total_price",$total_price);
        $sql->execute();
    }
    	public function getList($offset, $id_company) {
		$array = array();

		$sql = $this->db->prepare("
			SELECT
				purchases.id,
                                purchases.id_provider,
				purchases.date_purchase,
				purchases.total_price,
				purchases.status,
                                providers.name
			FROM purchases
			LEFT JOIN providers ON providers.id = purchases.id_provider
			WHERE
				purchases.id_company = :id_company
			ORDER BY purchases.date_purchase DESC
			LIMIT $offset, 10");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}
