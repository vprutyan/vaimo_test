<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 12/13/2016
 * Time: 1:36 PM
 */

$installer = $this;

$installer->startSetup();

/**
 * Add admin column to order table
 */
$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'), 'associated_manager_id', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,        
        'nullable'  => true,
        'comment'   => 'Associated Manager'
    ));

    /**
     * Add unique index to postcode areas
     */
$sql=<<<SQLTEXT
ALTER TABLE vaimo_postcode_areas ADD UNIQUE (postcode_area);
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
