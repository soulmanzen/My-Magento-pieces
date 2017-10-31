<?php

class Stas_Twitter_Block_Tweets extends Mage_Core_Block_Template
{
    public function getQuantityTweets()
    {
        return (int) Mage::getStoreConfig('stastwittersection/stastwittersettings/quantity');
    }
}
