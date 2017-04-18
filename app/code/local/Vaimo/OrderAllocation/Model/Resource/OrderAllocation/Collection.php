<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 4/26/2016
 * Time: 6:37 PM
 */


class Vaimo_OrderAllocation_Model_Resource_OrderAllocation_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract{

	/**
	 * Initialize collection
	 *
	 * @return void
	 */
    protected function _construct(){
        $this->_init('orderallocation/orderallocation');
    }
}