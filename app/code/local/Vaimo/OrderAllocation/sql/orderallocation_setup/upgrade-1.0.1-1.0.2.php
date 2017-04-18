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
 * Add updated_at column
 */
$sql=<<<SQLTEXT
ALTER TABLE vaimo_postcode_areas ADD `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
