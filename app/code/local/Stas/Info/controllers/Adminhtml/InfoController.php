<?php

class Stas_Info_Adminhtml_InfoController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('stasmenu');
        $this->renderLayout();
    }
}