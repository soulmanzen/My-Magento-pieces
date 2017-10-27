<?php

class Stas_Info_Block_Adminhtml_Feedbacks_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function getHeaderText()
    {
        $model = Mage::registry('myfeedback_data');

        if ($model && $model->getId()) {
            $id = $model->getId();
            return Mage::helper('stasinfo')->__("Edit Feedback ID '%s'", $id);
        } else {
            return Mage::helper('stasinfo')->__('Add Feedback');
        }
    }

    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_mode = 'edit';

        $this->_blockGroup = 'stasinfo';
        $this->_controller = 'adminhtml_feedbacks';

        $this->_updateButton('save', 'label', Mage::helper('stasinfo')->__('Save Feedback'));
        $this->_updateButton('delete', 'label', Mage::helper('stasinfo')->__('Delete Feedback'));
    }
}