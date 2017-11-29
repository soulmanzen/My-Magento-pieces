<?php

class Stas_Facebookcomment_Block_Comment extends Mage_Core_Block_Template
{
    public function isEnable()
    {
        return Mage::getStoreConfig('facebookcommentsection/facebookcommentgroup/facebookcommentactive');
    }

    public function getColorscheme()
    {
        return Mage::getStoreConfig('facebookcommentsection/facebookcommentgroup/colorschemeselect');
    }

    public function getWidth()
    {
        return Mage::getStoreConfig('facebookcommentsection/facebookcommentgroup/width');
    }

    public function getNumberOfPosts()
    {
        return Mage::getStoreConfig('facebookcommentsection/facebookcommentgroup/numposts');
    }

    public function getOrderBy()
    {
        return Mage::getStoreConfig('facebookcommentsection/facebookcommentgroup/orderby');
    }

    public function getCurrentUrl()
    {
        return Mage::helper('core/url')->getCurrentUrl();
    }
}


