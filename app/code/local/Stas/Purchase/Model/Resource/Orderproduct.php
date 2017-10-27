<?php

class Stas_Purchase_Model_Resource_Orderproduct extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('staspurchase/orderproduct', 'order_id');
    }
}