<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 8:05 PM
 */

class Vaimo_OrderAllocation_Block_Adminhtml_OrderAllocation_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('orderallocation_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        return 'orderallocation/orderallocation_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
    	$store = $this->_getStore();
        $this->addColumn('entity_id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'entity_id'
            )
        );


        $this->addColumn('postcode_area',  array(
            'index'      => 'postcode_area',
            'header'     => $this->__('Postcode Area'),
        ));
        
        $this->addColumn('account_manager',  array(
        		'index'      => 'account_manager',
        		'header'     => $this->__('Account Manager'),
        ));
        
        $this->addColumn('threshold',  array(
        		'index'      => 'threshold',
        		'type'  => 'price',
        		'currency_code' => $store->getBaseCurrency()->getCode(),
        		'header'     => $this->__('Threshold'),
        ));
        
        $this->addColumn('updated_at',  array(
        		'index'      => 'updated_at',
        		'type' => 'datetime',
        		'header'     => $this->__('Updated At'),
        ));


        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('entity_id' => $row->getEntityId()));
    }
    
    protected function _getStore()
    {
    	$storeId = (int) $this->getRequest()->getParam('store', 0);
    	return Mage::app()->getStore($storeId);
    }
}