<?php

class Stas_Purchase_Block_Form extends Mage_Core_Block_Template
{
    public function getProducts()
    {
        return Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('name')->load();
    }
}