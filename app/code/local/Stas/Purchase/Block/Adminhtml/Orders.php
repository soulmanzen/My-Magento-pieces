<?php

class Stas_Purchase_Block_Adminhtml_Orders extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'staspurchase';
        $this->_controller = 'adminhtml_orders';
        $this->_headerText = $this->__('Orders');

        parent::__construct();
    }
}