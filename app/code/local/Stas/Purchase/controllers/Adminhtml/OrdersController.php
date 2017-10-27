<?php

class Stas_Purchase_Adminhtml_OrdersController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('stasmenu');
        $this->_addContent($this->getLayout()->createBlock('staspurchase/adminhtml_orders'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $renderedGridBlock = $this->getLayout()->createBlock('staspurchase/adminhtml_orders_grid')->toHtml();
        $this->getResponse()->setBody($renderedGridBlock);
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $model = Mage::getModel('staspurchase/orderproduct')->load($id);

        if ($model->getId() || 0 == $id) {
            Mage::register('orderproduct_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('stasmenu');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('staspurchase/adminhtml_orders_edit'));
            $this->_addLeft($this->getLayout()->createBlock('staspurchase/adminhtml_orders_edit_tabs'));

            $this->renderLayout();
        } else {
            $error = Mage::helper('staspurchase')->__('Order does not exist');
            Mage::getSingleton('adminhtml/session')->addError($error);
            $this->_redirect('*/*/index');
        }
    }

    public function saveAction()
    {
        $post = $this->getRequest()->getPost();
        $id = (int) $this->getRequest()->getParam('id');

        if ($post) {
            try {
                $post = $this->_filterDates($post, ['date']);

                $model = Mage::getModel('staspurchase/orderproduct');

                if ($id) {
                    $model->load($id);
                }

                $model->setCostumerName($post['costumer_name']);
                $model->setCostumerEmail($post['costumer_email']);
                $model->setProductName($post['product_name']);
                $model->setProductName($post['product_name']);
                $model->setTimestamp($post['date']);
                $model->save();

                $success = $this->__('Order was saved!');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
                Mage::getSingleton('adminhtml/session')->setOrdersData(null);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setOrdersData($post);
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $model = Mage::getModel('staspurchase/orderproduct');
                $model->setId($id)->delete();

                $success = $this->__('Order was deleted!');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/');
    }
}