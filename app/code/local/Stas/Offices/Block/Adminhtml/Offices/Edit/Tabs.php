<?php

class Stas_Offices_Block_Adminhtml_Offices_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct(array $args = array())
    {
        parent::__construct();

        $this->setId('edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Offices Information'));
    }

    protected function _beforeToHtml()
    {
        $tabContent = $this->getLayout()->createBlock('stasoffices/adminhtml_offices_edit_tab_general')->toHtml();

        $this->addTab('general_tab',[
            'label' => $this->__('General'),
            'title' => $this->__('General'),
            'content' => $tabContent
        ]);

        return parent::_beforeToHtml();
    }
}
