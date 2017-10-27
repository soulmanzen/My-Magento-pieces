<?php

class Stas_Info_Block_Adminhtml_Feedbacks extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'stasinfo';
        $this->_controller = 'adminhtml_feedbacks';
        $this->_headerText = $this->__('Feedbacks');

        parent::__construct();
    }
}