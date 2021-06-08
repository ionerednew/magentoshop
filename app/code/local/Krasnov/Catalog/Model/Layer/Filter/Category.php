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
 * Layer category filter
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Model
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Model_Layer_Filter_Category extends Mage_Catalog_Model_Layer_Filter_Category
{
    const DEFAULT_CATEGORY_LEVEL = 3;

    /**
     * Category
     *
     * @var Mage_Catalog_Model_Category
     */
    protected $_currentCategory;

    /**
     * Get selected category object
     *
     * @return Mage_Catalog_Model_Category
     */
    public function getCategory()
    {
        if (is_null($this->_currentCategory)) {
            $category = $this->getLayer()->getCurrentCategory();
            $this->_categoryId = $category->getId();
            $this->_currentCategory = $category->getParentCategory() &&
                $category->getLevel() > self::DEFAULT_CATEGORY_LEVEL ?
                    $category->getParentCategory() :
                    $category;
        }
        return $this->_currentCategory;
    }

    /**
     * Get data array for building category filter items
     *
     * @return array
     */
    protected function _getItemsData()
    {
        $key  = $this->getLayer()->getStateKey() . '_SUBCATEGORIES';
        $data = $this->getLayer()->getAggregator()->getCacheData($key);

        if ($data === null) {
            $category   = $this->getCategory();
            /** @var $category Mage_Catalog_Model_Category */
            $categories = $category->getChildrenCategories();
            $this->getLayer()->getProductCollection()->addCountToCategories($categories);
            $data   = [];

            foreach ($categories as $category) {
                if ($category->getIsActive() && $category->getProductCount()) {
                    $data[] = [
                        'label' => Mage::helper('core')->escapeHtml($category->getName()),
                        'value' => $category->getId(),
                        'count' => $category->getProductCount(),
                        'url'   => $category->getRequestPath()
                    ];
                }
            }
            $data[] = $this->_getDefaultItem();
            $tags   = $this->getLayer()->getStateTags();
            $this->getLayer()->getAggregator()->saveCacheData($data, $key, $tags);
        }
        return $data;
    }

    /**
     * is current category catalog
     *
     * @return bool
     */
    private function _isCurrentCategoryCatalog()
    {
        return $this->getLayer()->getCurrentCategory()->getId()
            == Mage::helper('krasnov_catalog')->getCatalogCategoryId();
    }

    /**
     * Get default category
     *
     * @return array
     */
    protected function _getDefaultItem()
    {
        $isCatalogCategory = $this->_isCurrentCategoryCatalog();
        return [
            'label'               => Mage::helper('krasnov_catalog')->__($isCatalogCategory ? 'View all' : 'Return to catalog'),
            'value'               => $this->getCategory()->getId(),
            'count'               => 1,
            'url'                 => Mage::helper('krasnov_catalog')->getCatalogRequestPathUrl(),
        ];
    }

    /**
     * Is item currently chosen
     *
     * @param Mage_Catalog_Model_Layer_Filter_Item $item item
     * @return boolean
     */
    public function isChosen($item)
    {
        return $this->_categoryId == $item->getValue();
    }

    /**
     * Initialize filter items
     *
     * @return  Mage_Catalog_Model_Layer_Filter_Abstract
     */
    protected function _initItems()
    {
        $data  = $this->_getItemsData();
        $items = [];
        foreach ($data as $itemData) {
            $items[] = $this->_createItem(
                $itemData['label'],
                $itemData['value'],
                $itemData['count'],
                $itemData['url']
            );
        }
        $this->_items = $items;
        return $this;
    }

    /**
     * Create filter item object
     *
     * @param string $label label
     * @param mixed  $value value
     * @param int    $count count
     * @param string $url   url
     * @return  Mage_Catalog_Model_Layer_Filter_Item
     */
    protected function _createItem($label, $value, $count=0, $url = null)
    {
        return Mage::getModel('catalog/layer_filter_item')
            ->setFilter($this)
            ->setLabel($label)
            ->setValue($value)
            ->setCount($count)
            ->setUrl($url);
    }
}
