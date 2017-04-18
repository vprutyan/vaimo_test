<?php

/**
 * Order Allocation Observer
 * 
 * @package    Vaimo_OrderAllocation
 * @author     Vladimir Prutian
 */
class Vaimo_OrderAllocation_Model_Observer
{
	/**
	* Process catalog data after category move
	*
	* @param   Varien_Event_Observer $observer
	* @return  void
	*/
	public function allocateOrderToManager($observer){
		$order = $observer->getOrder();
		if($order){
			$postcode = $order->getShippingAddress()->getPostcode();
			$model = Mage::getModel('orderallocation/orderallocation');
			$model->load($postcode, 'postcode_area');
			if($model->getEntityId()){
				$threshold = $model->getThreshold();
				if($order->getBaseGrandTotal() > $threshold){
					$order->setAssociatedManagerId($model->getEntityId());
				}				
			}
		}
	}
}