<?php
$products = Mage::getModel('catalog/product')->getCollection();

foreach ($products as $product) {
    $random = rand(0, 1);
    $product->setTestattribute($random)
        ->save();
}