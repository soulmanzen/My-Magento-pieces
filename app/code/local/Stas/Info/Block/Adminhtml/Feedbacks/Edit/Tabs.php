<?php

class Stas_Info_Block_Adminhtml_Feedbacks_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('stasinfo')->__('Feedbacks Information'));
    }

    protected function _beforeToHtml()
    {
        $tabBlock = $this->getLayout()->createBlock('stasinfo/adminhtml_feedbacks_edit_tab_general')->toHtml();

        $this->addTab('general_tab', [
            'label' => Mage::helper('stasinfo')->__('General'),
            'title' => Mage::helper('stasinfo')->__('General'),
            'content' => $tabBlock
        ]);

        return parent::_beforeToHtml();
    }
}