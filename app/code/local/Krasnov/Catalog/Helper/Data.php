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
 * the Krasnov Catalog module to newer versions in the future.
 * If you wish to customize the Krasnov Catalog module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @copyright  Copyright (C) 2020 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Catalog helper
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Helper
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Helper_Data extends Mage_Core_Helper_Data
{
    private $_catalogCategory;

    const BESTSELLER_CATEGORY_ID_PATH_XML = 'catalog/navigation/bestseller_category';
    const CATALOG_CATEGORY_ID_PATH_XML = 'catalog/navigation/catalog_category';

    /**
     * return bestseller category id
     *
     * @return int
     */
    public function getBestsellerCategoryId()
    {
        return Mage::getStoreConfig(self::BESTSELLER_CATEGORY_ID_PATH_XML);
    }

    /**
     * return catalog category id
     *
     * @return int
     */
    public function getCatalogCategoryId()
    {
        return Mage::getStoreConfig(self::CATALOG_CATEGORY_ID_PATH_XML);
    }

    /**
     * get catalog url
     *
     * @return string
     */
    public function getCatalogUrl()
    {
        return $this->_getCatalogCategory()->getUrl();
    }

    /**
     * return catalog category
     *
     * @return Mage_Catalog_Model_Category
     */
    private function _getCatalogCategory()
    {
        if (!$this->_catalogCategory) {
            $this->_catalogCategory = Mage::getModel('catalog/category')->load($this->getCatalogCategoryId());
        }
        return $this->_catalogCategory;
    }

    /**
     * return request path
     *
     * @return string
     */
    public function getCatalogRequestPathUrl()
    {
        return $this->_getCatalogCategory()->getRequestPath();
    }
}
