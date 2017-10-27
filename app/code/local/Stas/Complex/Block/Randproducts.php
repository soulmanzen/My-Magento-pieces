<?php

class Stas_Complex_Block_Randproducts extends Mage_Core_Block_Template
{
    private function getProducts()
    {
        return Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('name')->load();
    }

    /**
     * @param $number integer
     * @return mixed
     */
    public function getRandomProducts($number)
    {
        $names = [];

        foreach ($this->getProducts() as $product) {
            $names[] = $product->getName();
        }

        return array_rand(array_flip($names), $number);
    }
}
