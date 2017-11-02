<?php

class Stas_Collections_Block_Display extends Mage_Core_Block_Template
{
    /**
     * @param $word string
     * get products which name contains $word
     */
    public function getProductsByWordInName($word = 'product')
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToSelect('name');
        $products->addFieldToFilter('name', ['like' => "%$word%"]);

        return $products->load();
    }

    public function getProductsInRangePrice($from = 50, $to = 150)
    {
        return Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('price')
            ->addFieldToFilter('price', ['from' => $from, 'to' => $to])
            ->load();
    }

    public function getProductsWithSpecialPrice()
    {
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('special_price')
            ->addFieldToFilter('special_price', ['notnull' => true]);

        return $products->load();
    }

    public function getCategoriesByCondition()
    {
        $categories = Mage::getModel('catalog/category')->getCollection()
            ->addAttributeToSelect('description')
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('meta_title')
            ->addFieldToFilter('description', ['null' => true])
            ->addFieldToFilter(['name', 'meta_title'], [['like' => 'Category%'], ['like' => 'Category%']]);

        return $categories->load();
    }
}