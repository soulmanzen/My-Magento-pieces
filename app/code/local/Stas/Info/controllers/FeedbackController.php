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

    public function showAction()
    {
        $pageNumber = (int) $this->getRequest()->getParam('pagenum');

        if (!$pageNumber) {
            $pageNumber = 1;
        }

        Mage::register('stas_info_showfeedbacks_pagenumber', $pageNumber);

        $sortBy = $this->getRequest()->getPost('sortby');
        if ($sortBy) {
            Mage::getSingleton('core/session')->setSortBy($sortBy);
        }

        $direction = $this->getRequest()->getPost('direction');
        if ($direction) {
            Mage::getSingleton('core/session')->setDirection($direction);
        }

        $this->loadLayout();
        $block = $this->getLayout()->createBlock('stasinfo/showfeedbacks')
            ->setTemplate('stas/info/showfeedbacks.phtml');
        $this->getLayout()->getBlock('head')->addCss('css/stas/feedbacktable.css');
        $this->getLayout()->getBlock('content')->append($block);
        $this->renderLayout();
    }
}


