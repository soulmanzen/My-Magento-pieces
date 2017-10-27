<?php

class Stas_Info_FeedbackController extends Mage_Core_Controller_Front_Action
{
    public function formAction()
    {
        $type = empty($this->getRequest()->getParam('type')) ? '' : $this->getRequest()->getParam('type');

        Mage::register('stas_info_feedback_type', $type);

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
                $message[] = 'Thank you! Your message has been sent';
                $this->insertToTable($paramsForm);
            } else {
                $message = $errors;
            }

            $this->getResponse()->setBody(json_encode($message));
        }
    }

    private function validate($array) {
        $possibleErrors = [];

        $possibleErrors['name'] = Mage::helper('stasinfo')->nameValidate($array, 'name');
        $possibleErrors['email'] = Mage::helper('stasinfo')->emailValidate($array, 'email');
        $possibleErrors['phone'] = Mage::helper('stasinfo')->phoneValidate($array,'phone');
        $possibleErrors['message'] = Mage::helper('stasinfo')->isEmpty($array, 'message');
        $possibleErrors['type'] = Mage::helper('stasinfo')->isEmpty($array, 'type');

        return array_filter($possibleErrors);
    }

    private function insertToTable($array)
    {
        $myfeedback = Mage::getModel('stasinfo/myfeedback');
        $myfeedback->setName($array['name']);
        $myfeedback->setEmail($array['email']);
        $myfeedback->setPhone($array['phone']);
        $myfeedback->setMessage($array['message']);
        $myfeedback->setType($array['type']);
        $myfeedback->save();
    }
}


