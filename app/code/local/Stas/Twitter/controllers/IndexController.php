<?php

class Stas_Twitter_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $block = $this->getLayout()
            ->createBlock('stastwitter/tweets')
            ->setTemplate('stas/twitter/tweets.phtml');
        $this->getLayout()->getBlock('content')->append($block);
        $this->renderLayout();
    }
}