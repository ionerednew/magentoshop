<?php
$installer = $this;
$installer->startSetup();
try {
    $fieldList = ['price','special_price','special_from_date','special_to_date'];
    foreach ($fieldList as $field) {
        $applyTo = explode(',', $installer->getAttribute('catalog_product', $field, 'apply_to'));
        if (!in_array('grouped', $applyTo)) {
            $applyTo[] = 'grouped';
            $installer->updateAttribute('catalog_product', $field, 'apply_to', join(',', $applyTo));
        }
    }
} catch (Exception $e) {
    Mage::logException($e);
}

$installer->endSetup();

