<?php

class Stas_Offices_Model_Resource_Myoffices extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('stasoffices/myoffices', 'office_id');
    }
}