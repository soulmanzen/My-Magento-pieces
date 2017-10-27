<?php

class Stas_Info_Block_Feedback extends Mage_Core_Block_Template
{
    public function getType()
    {
        return Mage::registry('stas_info_feedback_type');
    }
}