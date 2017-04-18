<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 4/26/2016
 * Time: 6:36 PM
 */


class Vaimo_OrderAllocation_Model_Resource_OrderAllocation extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('orderallocation/orderallocation', 'entity_id');
    }
}