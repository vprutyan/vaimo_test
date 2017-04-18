<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 8:03 PM
 */

class Vaimo_OrderAllocation_Block_Adminhtml_OrderAllocation extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'orderallocation';
        $this->_controller = 'adminhtml_orderallocation';
        $this->_headerText = $this->__('Order Allocations');

        parent::__construct();
    }
}