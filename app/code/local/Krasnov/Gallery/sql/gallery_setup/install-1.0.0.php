<?php
/**
 * Krasnov Web extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Krasnov Gallery module to newer versions in the future.
 * If you wish to customize the Krasnov Gallery module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @copyright  Copyright (C) 2020 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$installer = $this;
$installer->startSetup();

try {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('gallery/view'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
            'unsigned' => true,
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
        ], 'View ID')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, [], 'Created date')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, [], 'Updated date')
        ->addColumn('use_in_slider', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [], 'Use in slider')
        ->addColumn('position', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [], 'Position')
        ->addColumn('file', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [], 'File')
        ->setComment('View');
    $installer->getConnection()->createTable($table);

    Mage::getModel('admin/block')
        ->setBlockName('gallery/slider')
        ->setIsAllowed(1)
        ->save();

} catch (Exception $e) {
    Mage::logException($e);
}

$installer->endSetup();
