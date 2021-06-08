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
 * Layer filter attribute
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Model
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Model_Layer_Filter_Attribute extends Mage_Catalog_Model_Layer_Filter_Attribute
{
    /**
     * Filter values
     * @var array
     */
    protected $_filterValues = [];

    /**
     * Apply attribute option filter to product collection
     *
     * @param Zend_Controller_Request_Abstract $request     Request
     * @param Varien_Object                    $filterBlock Filter block
     *
     * @return Mage_Catalog_Model_Layer_Filter_Attribute
     */
    public function apply(Zend_Controller_Request_Abstract $request, $filterBlock)
    {
        $filter = $request->getParam($this->_requestVar);
        if (is_array($filter)) {
            return $this;
        }

        $this->_filterValues = $filterArray = explode(',', $filter);
        $text = $this->_getOptionText($filter);

        if (!is_array($text)) {
            $text = [$text];
        }

        $textLength = true;
        foreach ($filterArray as $index => $filterItem) {
            $textLength *= (strlen($text[$index]));
        }

        if (!empty($filterArray) && $filter && $textLength) {
            $this->_getResource()->applyFilterToCollection($this, $filterArray);
            foreach ($filterArray as $index => $filterItem) {
                $this->getLayer()->getState()->addFilter($this->_createItem($text[$index], $filterItem));
            }
        }

        return $this;
    }

    /**
     * Create filter item object
     *
     * @param string $label label
     * @param mixed  $value value
     * @param int    $count count
     * @return Mage_Catalog_Model_Layer_Filter_Item
     */
    protected function _createItem($label, $value, $count = 0)
    {
        return Mage::getModel('catalog/layer_filter_item')
            ->setFilter($this)
            ->setLabel($label)
            ->setValue($value)
            ->setSelected(in_array($value, $this->_filterValues))
            ->setCount($count);
    }

    /**
     * Get filter value for reset current filter state
     *
     * @param string $filterValue Filter value
     * @return mixed
     */
    public function getResetFilterValue($filterValue)
    {
        $params     = $this->_filterValues;
        $currentKey = array_search($filterValue, $params);
        unset($params[$currentKey]);
        return implode('/', $params);
    }
}
