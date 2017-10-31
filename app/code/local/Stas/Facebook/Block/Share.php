<?php

class Stas_Facebook_Block_Share extends Mage_Core_Block_Template
{
    public function getText()
    {
        return Mage::getStoreConfig('stasfacebooksection/stasfacebooksettings/text');
    }

    public function getImage()
    {
        $filename = Mage::getStoreConfig('stasfacebooksection/stasfacebooksettings/image');

        return $this->getSkinUrl("images/stas/facebook/$filename");
    }
}
