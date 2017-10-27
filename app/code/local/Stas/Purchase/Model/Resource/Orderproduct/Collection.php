<?php

class Stas_Purchase_Model_Resource_Orderproduct_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('staspurchase/orderproduct');
    }
}