<?php

class Stas_Info_Adminhtml_FeedbackController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('stasmenu');
        $this->_addContent($this->getLayout()->createBlock('stasinfo/adminhtml_feedbacks'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $renderedGridBlock = $this->getLayout()->createBlock('stasinfo/adminhtml_feedbacks_grid')->toHtml();
        $this->getResponse()->setBody($renderedGridBlock);
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');

        $model = Mage::getModel('stasinfo/myfeedback')->load($id);


        if ($model->getId() || $id == 0) {
            Mage::register('myfeedback_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('stasmenu');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('stasinfo/adminhtml_feedbacks_edit'));
            $this->_addLeft($this->getLayout()->createBlock('stasinfo/adminhtml_feedbacks_edit_tabs'));

            $this->renderLayout();
        } else {
            $error = Mage::helper('stasinfo')->__('Feedback does not exist');
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
                $post = $this->_filterDates($post,['date']);

                $model = Mage::getModel('stasinfo/myfeedback');

                if ($id) {
                    $model->load($id);
                }

                $model->setName($post['name']);
                $model->setEmail($post['email']);
                $model->setPhone($post['phone']);
                $model->setMessage($post['message']);
                $model->setStatus($post['status']);
                $model->setTimestamp($post['date']);
                $model->setType($post['type']);
                $model->save();

                $success = Mage::helper('adminhtml')->__('Feedback was saved!');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
                Mage::getSingleton('adminhtml/session')->setFeedbacksData(false);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFeedbacksData($post);
                $this->_redirect('*/*/edit',['id' => $id]);
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
                $model = Mage::getModel('stasinfo/myfeedback');
                $model->setId($id)->delete();

                $success = Mage::helper('adminhtml')->__('Feedback was successfully deleted.');
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