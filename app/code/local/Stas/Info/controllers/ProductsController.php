<?php

class Stas_Info_ProductsController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection();

        foreach ($products as $product) {
            echo "<pre>";
            echo '<h3>'.$product->getEntityId().'</h3>';
        }
    }

    public function productAction()
    {
        if ($id = $this->getRequest()->getParam('id') and is_numeric($id)) {
            $product = Mage::getModel('catalog/product')->load($id);
            echo $product->getName() . ' - ' . $product->getPrice();
        } else {
            echo "error: product id is required";
        }
    }
}