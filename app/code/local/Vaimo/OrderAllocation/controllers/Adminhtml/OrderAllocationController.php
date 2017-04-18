<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 8:11 PM
 */

class Vaimo_OrderAllocation_Adminhtml_OrderAllocationController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }

    /**
     * New option action
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Edit option action
     */
    public function editAction()
    {
        $this->_initAction();

        $id  = $this->getRequest()->getParam('entity_id');
        $model = Mage::getModel('orderallocation/orderallocation');

        if ($id) {
           
            $model->load($id);

            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This record no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : $this->__('New Record'));

        $data = Mage::getSingleton('adminhtml/session')->getOrderAllocationData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('orderallocation', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit Record') : $this->__('New Record'), $id ? $this->__('Edit Record') : $this->__('New Record'))
            ->_addContent($this->getLayout()->createBlock('orderallocation/adminhtml_orderallocation_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    /**
     * Save option action
     */
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('orderallocation/orderallocation');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The record has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this record.'));
            }

            Mage::getSingleton('adminhtml/session')->setOrderAllocationData($postData);
            $this->_redirectReferer();
        }
    }
   
    /**
     * Delete option action
     */
    public function deleteAction()
    {
        $model = Mage::getSingleton('orderallocation/orderallocation');
        $id = $this->getRequest()->getParam('entity_id');
        if ($id) {
            try {
                $model->load($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('The record has been deleted.'));
            }
            catch (Exception $e){
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/orderallocation');
    }

    public function messageAction()
    {
        $data = Mage::getModel('orderallocation/orderallocation')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * Initialize action    
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()           
            ->_setActiveMenu('orderallocation/order_allocation')
            ->_title($this->__('Vaimo'))->_title($this->__('OrderAllocation'))
            ->_addBreadcrumb($this->__('Vaimo'), $this->__('Vaimo'))
            ->_addBreadcrumb($this->__('Record'), $this->__('OrderAllocation'));

        return $this;
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('orderallocation/order_allocation');
    }
}