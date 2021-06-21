<?php
/**
 *  Krasnov Catalog extension for Magento
 *
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
 * the Krasnov Catalog module to newer versions in the future.
 * If you wish to customize the Krasnov Catalog module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @copyright  Copyright (C) 2021
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * @var $this Mage_Catalog_Model_Resource_Setup
 */

$installer = $this;
$installer->startSetup();

try {
    $installer->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'h1', [
        'type'            => 'varchar',
        'group'	          => 'General',
        'label'           => 'H1',
        'input'           => 'text',
        'global'          => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'required'        => false,
    ]);

    $installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'label', [
        'type'                    => 'int',
        'label'                   => 'Label',
        'input'                   => 'select',
        'visible'                 => true,
        'required'                => false,
        'user_defined'            => true,
        'group'                   => 'General',
        'source'                  => 'eav/entity_attribute_source_table',
        'used_in_product_listing' => true,
        'option'                  => ['values' => ['Новинка', 'Sale']]
    ]);
} catch (Exception $e) {
    Mage::logException($e);
}

$installer->endSetup();
