<?php

class Stas_Purchase_Block_Adminhtml_Orders_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('stas_purchase_orders_grid');
        $this->setDefaultSort('order_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('staspurchase/orderproduct')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('order_id', [
            'type' => 'number',
            'header'=> $this->__('ID'),
            'sortable' => true,
            'width' => '50',
            'index' => 'order_id'
        ]);

        $this->addColumn('costumer_name', [
            'header'=> $this->__('Costumer Name'),
            'sortable' => true,
            'index' => 'costumer_name'
        ]);

        $this->addColumn('costumer_email', [
            'header'=> $this->__('Costumer Email'),
            'sortable' => true,
            'index' => 'costumer_email',
        ]);

        $this->addColumn('product_name', [
            'header'=> $this->__('Product Name'),
            'sortable' => true,
            'index' => 'product_name'
        ]);

        $this->addColumn('timestamp', [
            'header'=> $this->__('Created'),
            'sortable' => true,
            'index' => 'timestamp',
            'type' => 'date'
        ]);

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}