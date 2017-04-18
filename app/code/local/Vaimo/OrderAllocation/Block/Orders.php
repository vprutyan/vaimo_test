<?php

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 9:23 PM
 */
class Vaimo_OrderAllocation_Block_Orders extends Mage_Core_Block_Template
{
	public function __construct()
	{
		parent::__construct();
		$managerId = Mage::app()->getRequest()->getParam('manager');
		$collection = Mage::getModel('sales/order')
			->getCollection()
			->addAttributeToSelect('entity_id')
			->addAttributeToSelect('increment_id')
			->addAttributeToSelect('created_at')
			->addAttributeToFilter('associated_manager_id', array('eq' => $managerId));
			$collection->getSelect()->order('created_at DESC');
		$this->setCollection($collection);
	}

	protected function _prepareLayout()
	{
		parent::_prepareLayout();

		$pager = $this->getLayout()->createBlock('page/html_pager', 'orders.pager');
		$pager->setAvailableLimit(array(20=>20));
		$pager->setCollection($this->getCollection());
		$this->setChild('pager', $pager);
		return $this;
	}

	public function getPagerHtml()
	{
		return $this->getChildHtml('pager');
	}
}