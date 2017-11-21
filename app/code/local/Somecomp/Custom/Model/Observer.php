<?php

class Somecomp_Custom_Model_Observer
{
    public function filterProductsByTestattribute($observer)
    {
        $observer->getCollection()->addAttributeToFilter('testattribute', array('neq' => '0'));

        return $this;
    }
}