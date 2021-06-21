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
 * @copyright  Copyright (C) 2021 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Category layer block
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Block_Layer_Filter_Category extends Mage_Catalog_Block_Layer_Filter_Category
{
    /**
     * Init filter model name
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('catalog/layer/filter/category.phtml');
    }

    /**
     * Is item currently chosen
     *
     * @param Mage_Catalog_Model_Layer_Filter_Item $item item
     * @return boolean
     */
    public function isChosen($item)
    {
        return $this->_filter->isChosen($item);
    }

    /**
     * Get current category
     *
     * @return mixed
     */
    public function getCurrentCategory()
    {
        return $this->_filter->getCategory();
    }

    /**
     * Get h1
     *
     * @return mixed
     */
    public function getH1()
    {
        $category = Mage::getSingleton('catalog/layer')->getCurrentCategory();
        return $category->getData('h1') ? : $this->getCurrentCategory()->getName();
    }

    /**
     * Get count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->_filter->getLayer()->getProductCollection()->getSize();
    }

    /**
     * Get max price
     *
     * @return float
     */
    public function getMaxPrice()
    {
        return $this->_filter->getLayer()->getProductCollection()->getMaxPrice();
    }

    /**
     * Get min price
     *
     * @return float
     */
    public function getMinPrice()
    {
        return $this->_filter->getLayer()->getProductCollection()->getMinPrice();
    }

    /**
     * is current category catalog
     *
     * @return bool
     */
    public function isCurrentCategoryCatalog()
    {
        return $this->getCurrentCategory()->getId() == Mage::helper('krasnov_catalog')->getCatalogCategoryId();
    }
}
