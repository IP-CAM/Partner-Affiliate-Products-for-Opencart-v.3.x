<?php

class ModelExtensionModuleParther extends Model 
{
	/**
     * @param  int|string $product_id
     * @return array
     */
    public function getPartnerByProductId($product_id)
    {
        $query = $this->db->query("SELECT COUNT(pp.`product_id`) > 0 as `exists`, pp.`html` FROM `" . DB_PREFIX . "product_partner` pp WHERE pp.`product_id` = " . (int)$product_id);
        
        return $query->row;
    }

	/**
     * @return string
     */
	public function defaultHTML()
	{
		return 'false';
	}
}
