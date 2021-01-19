<?php

class ModelExtensionModuleParther extends Model
{
    /**
     * @return void
     */
    public function install()
    {
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "product_partner`;");
        $this->db->query("CREATE TABLE `" . DB_PREFIX . "product_partner` (`product_id` int(11) NOT NULL, `html` text COLLATE utf8mb4_unicode_ci NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
    }
    
    /**
     * @return void
     */
    public function uninstall()
    {
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "product_partner`;");
    }
    
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
     * @param int|string $product_id
     * @param array $data
     * @return void
     */
    public function save($product_id, $data)
    {
        $html = true === key_exists('partner_html', $data) ? trim($data['partner_html']) : null;
        if (null !== $html && 0 === mb_strlen($html)) {
            $html = null;
        }
        $query = $this->db->query("SELECT `product_id` FROM `" . DB_PREFIX . "product_partner` WHERE `product_id` = " . (int)$product_id);
        
        if ($query->num_rows > 0) {
            if (null === $html) {
                $this->db->query("DELETE FROM `" . DB_PREFIX . "product_partner` WHERE `product_id` = " . (int)$product_id);
            } else {
                $this->db->query("UPDATE `" . DB_PREFIX . "product_partner` SET `html` = '" . $this->db->escape($html) . "' WHERE `product_id` = " . (int)$product_id);
            }
        } else {
            if (null !== $html) {
                $this->db->query("INSERT INTO `" . DB_PREFIX . "product_partner` (`product_id`, `html`) VALUE (" . (int)$product_id . ", '" . $this->db->escape($html) . "')");
            }
        }
    }
}
