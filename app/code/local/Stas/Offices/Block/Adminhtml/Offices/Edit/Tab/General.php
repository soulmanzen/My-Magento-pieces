<?php

class Stas_Offices_Block_Adminhtml_Offices_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('offices_tab_general', [
            'legend' => $this->__('General')
        ]);

        $fieldset->addField('name', 'text', [
            'label' => $this->__('Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'name'
        ]);

        $fieldset->addField('lat', 'text', [
            'label' => $this->__('Latitude'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'lat'
        ]);

        $fieldset->addField('lng', 'text', [
            'label' => $this->__('Longitude'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'lng'
        ]);

        if (Mage::getSingleton('adminhtml/session')->getOfficesData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getOfficesData());
            Mage::getSingleton('adminhtml/session')->setOfficesData(null);
        } elseif (Mage::registry('myoffices_data')) {
            $form->setValues(Mage::registry('myoffices_data')->getData());
        }

        return parent::_prepareForm();
    }
}
