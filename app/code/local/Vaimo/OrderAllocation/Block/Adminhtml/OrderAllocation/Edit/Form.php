<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 8:09 PM
 */

class Vaimo_OrderAllocation_Block_Adminhtml_OrderAllocation_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('orderallocation_form');
        $this->setTitle($this->__('Search Information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('orderallocation');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('entity_id' => $this->getRequest()->getParam('entity_id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Record Information'),
            'class'     => 'fieldset-wide',
        ));

        if($model->getEntityId()){
            $fieldset->addField('postcode_area', 'label', array(
                'container_id'      => 'postcode_area',
                'label'     => Mage::helper('checkout')->__('Postcode Area'),
                'title'     => Mage::helper('checkout')->__('Postcode Area'),
                'required'  => false,
            ));
        }
        else{
            $fieldset->addField('postcode_area', 'text', array(
                'name'      => 'postcode_area',
                'label'     => Mage::helper('checkout')->__('Postcode Area'),
                'title'     => Mage::helper('checkout')->__('Postcode Area'),
                'required'  => false,
            ));
        }

        
        $fieldset->addField('account_manager', 'text', array(
        		'name'      => 'account_manager',
        		'label'     => Mage::helper('checkout')->__('Account Manager'),
        		'title'     => Mage::helper('checkout')->__('Account Manager'),
        		'required'  => false,
        ));
        
        $fieldset->addField('threshold', 'text', array(
        		'name'      => 'threshold',
        		'label'     => Mage::helper('checkout')->__('Order Allocation Threshold'),
        		'title'     => Mage::helper('checkout')->__('Order Allocation Threshold'),
        		'required'  => false,
        ));

        if($model->getEntityId()){
            $fieldset->addType('customtype', 'Vaimo_OrderAllocation_Block_Adminhtml_Renderer_Orders');
            $fieldset->addField('entity_id', 'customtype', array(
                'name'      => 'entity_id',
                'label'     => Mage::helper('checkout')->__('Orders'),
            ));
        }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}