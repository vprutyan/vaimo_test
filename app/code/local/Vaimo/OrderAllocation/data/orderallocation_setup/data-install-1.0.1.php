<?php
/**
 * Created by PhpStorm.
 * User: Vladimir Prutyan
 * Date: 5/16/2016
 * Time: 12:15 AM
 */

$installer = $this;

$installer->startSetup();

/**
 * Install postcode areas and admin names from file
 */
    $data     = array();
    $filePath = Mage::getModuleDir('data', 'Vaimo_OrderAllocation') . '/account_managers.csv';

    $file = fopen($filePath,"r");
    if($file){
    	fgetcsv($file);
    	while(! feof($file))
    	{
    		$line = fgetcsv($file);
    		$data[] = array(
    				'postcode_area' => $line[0],
    				'account_manager'  => $line[1]
    		);
    	}    	
    	
    	$installer->getConnection()->insertArray(
    			$installer->getTable('vaimo_postcode_areas'),
    			array('postcode_area', 'account_manager'),
    			$data
    	);
    	 
    }
    fclose($file);    

    $installer->endSetup();
