<?php

class Stas_Info_Block_Adminhtml_Feedbacks_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('feedbacks_tab_general', [
            'legend' => Mage::helper('stasinfo')->__('General')
        ]);

        $fieldset->addField('name', 'text', [
            'label' => Mage::helper('stasinfo')->__('Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name',
        ]);

        $fieldset->addField('email', 'text', [
            'label' => Mage::helper('stasinfo')->__('Email'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'email',
        ]);

        $fieldset->addField('phone', 'text', [
            'label' => Mage::helper('stasinfo')->__('Phone'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'phone',
        ]);

        $fieldset->addField('message', 'editor', [
            'label' => Mage::helper('stasinfo')->__('Message'),
            'name' => 'message',
            'style' => 'height:100px;',
            'wysiwyg' => false,
            'class' => 'required-entry',
            'required' => true

        ]);

        $fieldset->addField('status', 'text', [
            'label' => Mage::helper('stasinfo')->__('Status'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'status'
        ]);

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('timestamp', 'date', [
            'name' => 'date',
            'label' => Mage::helper('mycompanyhelloworld')->__('Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => $dateFormatIso,
            'disabled' => false,
            'time' => false,
            'class' => 'validate-date validate-date-range date-range-custom_theme-from'
        ]);

        $fieldset->addField('type', 'select', [
            'label' => Mage::helper('stasinfo')->__('Type'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'type',
            'options' => array(
                'general' => 'general',
                'account' => 'account',
                'order' => 'order',
            )
        ]);

        if (Mage::getSingleton('adminhtml/session')->getFeedbacksData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getFeedbacksData());
            Mage::getSingleton('adminhtml/session')->setFeedbacksData(null);
        } elseif (Mage::registry('myfeedback_data')) {
            $form->setValues(Mage::registry('myfeedback_data')->getData());
        }

        return parent::_prepareForm();
    }
}