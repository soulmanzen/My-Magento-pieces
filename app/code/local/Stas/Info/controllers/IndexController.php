<?php

class Stas_Info_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'info dashboard <a href="/info/products">/info/products</a>';
    }

    public function feedbacksAction()
    {
        $feedbacks = Mage::getModel('stasinfo/myfeedback')->getCollection();

        foreach ($feedbacks as $feedback) {
            echo $feedback->getName() . ' | ';
            echo $feedback->getMessage() . ' | ';
            echo $feedback->getTimestamp() . '<br>';
        }
    }
}