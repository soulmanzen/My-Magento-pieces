<?php

class Stas_Purchase_Block_Adminhtml_Orders_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_mode = 'edit';

        $this->_blockGroup = 'staspurchase';
        $this->_controller = 'adminhtml_orders';

        $this->_updateButton('save', 'label', $this->__('Save Order'));
        $this->_updateButton('delete', 'label', $this->__('Delete Order'));
    }

    public function getHeaderText()
    {
        $model = Mage::registry('orderproduct_data');

        if ($model && $model->getId()) {
            $id = $model->getId();

            return Mage::helper('adminhtml')->__("Edit Order ID $id");
        } else {
            return Mage::helper('adminhtml')->__("Add New Order");
        }
    }
}
