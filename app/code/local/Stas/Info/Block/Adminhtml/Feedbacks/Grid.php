<?php

class Stas_Info_Block_Adminhtml_Feedbacks_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('stas_info_feedbacks_grid');
        $this->setDefaultSort('feedback_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('stasinfo/myfeedback')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('feedback_id', [
            'type' => 'number',
            'header'=> $this->__('ID'),
            'sortable' => true,
            'width' => '50',
            'index' => 'feedback_id'
        ]);

        $this->addColumn('name', [
            'header'=> $this->__('Name'),
            'sortable' => true,
            'index' => 'name'
        ]);

        $this->addColumn('email', [
            'header'=> $this->__('Email'),
            'sortable' => true,
            'index' => 'email',
        ]);

        $this->addColumn('phone', [
            'header'=> $this->__('Phone'),
            'sortable' => true,
            'index' => 'phone',
        ]);

        $this->addColumn('message', [
            'header'=> $this->__('Message'),
            'sortable' => true,
            'index' => 'message',
        ]);

        $this->addColumn('status', [
            'header'=> $this->__('Status'),
            'sortable' => true,
            'index' => 'status',
        ]);

        $this->addColumn('timestamp', [
            'header'=> $this->__('Created'),
            'sortable' => true,
            'index' => 'timestamp',
            'type' => 'date'
        ]);

        $this->addColumn('type', [
            'header'=> $this->__('Type'),
            'sortable' => true,
            'index' => 'type',
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