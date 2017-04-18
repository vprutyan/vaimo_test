<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 4/26/2016
 * Time: 6:31 PM
 */


class Vaimo_OrderAllocation_Model_OrderAllocation extends Mage_Core_Model_Abstract
{
	/**
	 * Initialize model
	 *
	 * @return void
	 */
    public function _construct()
    {
        $this->_init('orderallocation/orderallocation');
    }

}