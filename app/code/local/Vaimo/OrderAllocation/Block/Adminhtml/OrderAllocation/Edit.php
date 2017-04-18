<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 8:07 PM
 */

class Vaimo_OrderAllocation_Block_Adminhtml_OrderAllocation_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Init class
     */
    public function __construct()
    {
        $this->_blockGroup = 'orderallocation';
        $this->_controller = 'adminhtml_orderallocation';

        parent::__construct();

        $this->_updateButton('save', 'label', $this->__('Save Record'));
        $objId = $this->getRequest()->getParam('entity_id');

        if (! empty($objId)) {
            $this->_addButton('delete', array(
                'label'     => Mage::helper('adminhtml')->__('Delete'),
                'class'     => 'delete',
                'onclick'   => 'deleteConfirm(\''
                    . Mage::helper('core')->jsQuoteEscape(
                        Mage::helper('adminhtml')->__('Are you sure you want to do this?')
                    )
                    .'\', \''
                    . $this->getUrl('*/*/delete', array('entity_id' => $this->getRequest()->getParam('entity_id')))
                    . '\')',
            ));
        }
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('orderallocation')->getId()) {
            return $this->__('Edit Record');
        }
        else {
            return $this->__('New Record');
        }
    }
}