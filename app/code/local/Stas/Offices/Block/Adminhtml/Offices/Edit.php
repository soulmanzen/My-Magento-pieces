<?php

class Stas_Offices_Block_Adminhtml_Offices_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_mode = 'edit';

        $this->_blockGroup = 'stasoffices';
        $this->_controller = 'adminhtml_offices';

        $this->_updateButton('save', 'label', $this->__('Save This Office'));
        $this->_updateButton('delete', 'label', $this->__('Delete This Office'));
    }

    public function getHeaderText()
    {
        $model = Mage::registry('myoffices_data');

        if ($model && $model->getId()) {
            $name = $this->escapeHtml($model->getName());

            return $this->__("Edit Office '$name'");
        } else {
            return $this->__('Add new Office');
        }
    }
}
