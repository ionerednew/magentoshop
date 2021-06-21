<?php

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
