<?php

class Stas_Offices_Block_Officesmap extends Mage_Core_Block_Template
{
    public function getOffices()
    {
        $collection =  Mage::getModel('stasoffices/myoffices')->getCollection();

        $offices = [];

        foreach ($collection as $key => $office) {
            $offices[$key]['name'] = $office->getName();
            $offices[$key]['lat'] = floatval($office->getLat());
            $offices[$key]['lng'] = floatval($office->getLng());
        }

        return json_encode($offices);
    }

    public function getApiKey()
    {
        return Mage::helper('stasoffices')->getApiKey();
    }

    public function getWidthMap()
    {
        return (int) Mage::getStoreConfig('stasofficessection/stasofficessettings/width');
    }

    public function getHeightMap()
    {
        return (int) Mage::getStoreConfig('stasofficessection/stasofficessettings/height');
    }
}
