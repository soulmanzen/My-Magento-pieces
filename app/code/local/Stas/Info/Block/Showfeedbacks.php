<?php

class Stas_Info_Block_Showfeedbacks extends Mage_Core_Block_Template
{
    public function getByPage()
    {
        $pageNumber = $this->getPageNumber();
        $sortby = $this->getSortBy();
        $direction = $this->getDirection();
        $pageSize = 5;

        $collection = Mage::getModel('stasinfo/myfeedback')->getCollection();
        $collection->getSelect()->order("$sortby $direction");
        $collection->getSelect()->limit($pageSize, $pageSize * ($pageNumber - 1));

        return $collection;
    }

    public function getPagination()
    {
        $links = [];
        $collection = Mage::getModel('stasinfo/myfeedback')->getCollection();

        $feedbacks_count = $collection->count();

        if ($feedbacks_count > 5) {
            $pages = ceil($feedbacks_count / 5);
            for ($i = 1; $i <= $pages; $i++) {
                $links[] = [
                    'pagenum' => $i,
                    'href' => "/info/feedback/show/pagenum/$i",
                ];
            }
        }

        return $links;
    }

    public function getPageNumber()
    {
        return Mage::registry('stas_info_showfeedbacks_pagenumber');
    }

    public function getSortBy()
    {
        return Mage::getSingleton('core/session')->getSortBy();
    }

    public function getDirection()
    {
        return Mage::getSingleton('core/session')->getDirection();
    }
}