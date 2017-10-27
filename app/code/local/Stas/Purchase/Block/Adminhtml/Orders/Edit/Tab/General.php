<?php

class Stas_Purchase_Block_Adminhtml_Orders_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('orders_tab_general', [
            'legend' => $this->__('General')
        ]);

        $fieldset->addField('costumer_name', 'text', [
            'label' => $this->__('Customer Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'costumer_name'
        ]);

        $fieldset->addField('costumer_email', 'text', [
            'label' => $this->__('Customer Email'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'costumer_email'
        ]);

        $fieldset->addField('product_name', 'select', [
            'label' => Mage::helper('staspurchase')->__('Product Name'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'product_name',
            'options' => $this->getProductsNames(),
        ]);

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('timestamp', 'date', [
            'name' => 'date',
            'label' => Mage::helper('staspurchase')->__('Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => $dateFormatIso,
            'disabled' => false,
            'time' => false,
            'class' => 'validate-date validate-date-range date-range-custom_theme-from'
        ]);

        if (Mage::getSingleton('adminhtml/session')->getOrdersData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getOrdersData());
            Mage::getSingleton('adminhtml/session')->setOrdersData(null);
        } elseif (Mage::registry('orderproduct_data')) {
            $form->setValues(Mage::registry('orderproduct_data')->getData());
        }

        return parent::_prepareForm();
    }

    private function getProductsNames()
    {
        $products = Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('name')->load();
        $productsNames = [];

        foreach ($products as $product) {
            $productsNames[$product->getName()] = $product->getName();
        }

        return $productsNames;
    }
}
