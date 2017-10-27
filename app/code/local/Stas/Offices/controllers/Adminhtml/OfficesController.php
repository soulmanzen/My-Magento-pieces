<?php

class Stas_Offices_Adminhtml_OfficesController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('stasmenu');
        $this->_addContent($this->getLayout()->createBlock('stasoffices/adminhtml_offices'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $renderedGridBlock = $this->getLayout()->createBlock('stasoffices/adminhtml_offices_grid')->toHtml();
        $this->getResponse()->setBody($renderedGridBlock);
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('stasoffices/myoffices')->load($id);

        if ($model->getId() || 0 == $id) {
            Mage::register('myoffices_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('stasmenu');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('stasoffices/adminhtml_offices_edit'));
            $this->_addLeft($this->getLayout()->createBlock('stasoffices/adminhtml_offices_edit_tabs'));

            $this->renderLayout();
        } else {
            $error = $this->__('Office does not exists');
            Mage::getSingleton('adminhtml/session')->addError($error);
            $this->_redirect('*/*/index');
        }
    }

    public function saveAction()
    {
        $post = $this->getRequest()->getPost();
        $id = $this->getRequest()->getParam('id');

        if ($post) {
            try {
                $model = Mage::getModel('stasoffices/myoffices');
                if ($id) {
                    $model->load($id);
                }

                $model->setName($post['name']);
                $model->setLat($post['lat']);
                $model->setLng($post['lng']);
                $model->save();

                $success = $this->__('Office was saved!');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
                Mage::getSingleton('adminhtml/session')->setOfficesData(null);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setOfficesData($post);
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $model = Mage::getModel('stasoffices/myoffices');
                $model->setId($id)->delete();

                $success = $this->__('Office was successfully deleted');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/index');
    }
}