<?php

class Stas_Purchase_Block_Adminhtml_Orders_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct(array $args = array())
    {
        parent::__construct();

        $this->setId('edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Orders Information'));
    }

    protected function _beforeToHtml()
    {
        $tabBlock = $this->getLayout()->createBlock('staspurchase/adminhtml_orders_edit_tab_general')->toHtml();

        $this->addTab('general_tab', [
            'label' => $this->__('General'),
            'title' => $this->__('General'),
            'content' => $tabBlock,
        ]);

        return parent::_beforeToHtml();
    }
}
