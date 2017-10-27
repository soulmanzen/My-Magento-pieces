<?php

class Stas_Purchase_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function ajaxAction()
    {
        $paramsForm = $this->getRequest()->getPost();

        if ($paramsForm) {

            $message = [];

            $errors = $this->validate($paramsForm);

            if (empty($errors)) {
                $message[] = 'Thank you! Your order will be processed soon.';
                $this->insertToTable($paramsForm);
            } else {
                $message = $errors;
            }

            $this->getResponse()->setBody(json_encode($message));
        }
    }

    private function validate($array) {
        $possibleErrors = [];

        $possibleErrors['Costumer_Name'] = Mage::helper('staspurchase')->nameValidate($array, 'Costumer_Name');
        $possibleErrors['Costumer_Email'] = Mage::helper('staspurchase')->emailValidate($array, 'Costumer_Email');
        $possibleErrors['Product_Name'] = Mage::helper('staspurchase')->isEmpty($array, 'Product_Name');

        return array_filter($possibleErrors);
    }

    private function insertToTable($array)
    {
        $orderproduct = Mage::getModel('staspurchase/orderproduct');
        $orderproduct->setCostumerName($array['Costumer_Name']);
        $orderproduct->setCostumerEmail($array['Costumer_Email']);
        $orderproduct->setProductName($array['Product_Name']);
        $orderproduct->save();
    }
}