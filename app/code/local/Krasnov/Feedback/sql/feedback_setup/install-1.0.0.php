<?php
$installer = $this;
$installer->startSetup();

try {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('feedback/feedback'))
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
            'unsigned' => true,
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
        ], 'Feedback ID')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, [], 'Created date')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [], 'Name')
        ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [], 'E-mail')
        ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, 255, [], 'Phone')
        ->addColumn('question', Varien_Db_Ddl_Table::TYPE_TEXT, null, [], 'Question')
        ->setComment('Feedback');
    $installer->getConnection()->createTable($table);
} catch (Exception $e) {
    Mage::logException($e);
}

$installer->endSetup();
