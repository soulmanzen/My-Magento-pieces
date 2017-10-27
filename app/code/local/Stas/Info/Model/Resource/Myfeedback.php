<?php

class Stas_Info_Model_Resource_Myfeedback extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('stasinfo/myfeedback', 'feedback_id');
    }
}