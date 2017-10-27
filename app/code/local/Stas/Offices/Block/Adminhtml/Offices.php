<?php

class Stas_Offices_Block_Adminhtml_Offices extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'stasoffices';
        $this->_controller = 'adminhtml_offices';
        $this->_headerText = $this->__('My Offices');

        parent::__construct();
    }
}