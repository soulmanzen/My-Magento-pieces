<?php

class Stas_Complex_Block_Randcategories extends Mage_Core_Block_Template
{
    private function getCategories()
    {
        return Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('name')->load();
    }

    /**
     * @param $number integer
     * @return mixed
     */
    public function getRandomCategories($number)
    {
        $names = [];

        foreach ($this->getCategories() as $category) {
            $names[] = $category->getName();
        }

        return array_rand(array_flip($names), $number);
    }
}
