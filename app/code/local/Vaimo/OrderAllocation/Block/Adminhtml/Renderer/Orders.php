<?php

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 9:19 PM
 */
class Vaimo_OrderAllocation_Block_Adminhtml_Renderer_Orders extends Varien_Data_Form_Element_Abstract
{

	protected $_element;

    public function getElementHtml()
    {   
        $managerId = $this->getValue();
        $html = "<iframe  frameborder='0' scrolling='no' style='height: 480px; width: 400px;' src='" . Mage::getBaseUrl()."orderallocation/index/index/manager/".$managerId . "'></iframe>";
        return $html;
    }
}