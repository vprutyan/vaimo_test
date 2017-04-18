<?php

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/7/2016
 * Time: 9:27 PM
 */

class Vaimo_OrderAllocation_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}
}
