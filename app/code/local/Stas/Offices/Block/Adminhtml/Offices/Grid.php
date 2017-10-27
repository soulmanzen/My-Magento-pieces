<?php

class Stas_Offices_Block_Adminhtml_Offices_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('stas_offices_offices_grid');
        $this->setDefaultSort('order_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('stasoffices/myoffices')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('office_id', [
            'type' => 'number',
            'header'=> $this->__('ID'),
            'sortable' => true,
            'width' => '50',
            'index' => 'office_id'
        ]);

        $this->addColumn('name', [
            'header'=> $this->__('Name'),
            'sortable' => true,
            'index' => 'name'
        ]);

        $this->addColumn('lat', [
            'header'=> $this->__('Latitude'),
            'sortable' => true,
            'index' => 'lat',
        ]);

        $this->addColumn('lng', [
            'header'=> $this->__('Longitude'),
            'sortable' => true,
            'index' => 'lng'
        ]);

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}