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
 * Create table 'vaimo_postcode_areas'
 */
$table = $installer->getConnection()
    ->newTable('vaimo_postcode_areas')
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity Id')
    ->addColumn('postcode_area', Varien_Db_Ddl_Table::TYPE_TEXT, 12, array(
    ), 'Post Code Area')
    ->addColumn('account_manager', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Account Managers')
    ->addColumn('threshold', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,2', array(        
        'default'   => '300.0000',
    ), 'Order Allocation Threshold')          
    ->setComment('Postcode Areas and Account Managers');
$installer->getConnection()->createTable($table);

$installer->endSetup();
