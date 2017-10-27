<?php

class Stas_Offices_Model_Resource_Myoffices_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('stasoffices/myoffices');
    }
}