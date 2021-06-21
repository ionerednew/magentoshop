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
 * Layer filter item
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Model
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Model_Layer_Filter_Item extends Mage_Catalog_Model_Layer_Filter_Item
{
    /**
     * Get filter item url
     *
     * @return string
     */
    public function getUrl()
    {
        if ($this->getData('url')) {
            return Mage::getUrl($this->getData('url'));
        }
        /** @var Krasnov_Catalog_Helper_Filter $helper */
        $helper              = Mage::helper('catalog/filter');
        $separator           = $helper->getSeparator();
        $requestVarName      = $this->getFilter()->getRequestVar();
        $requestValue        = $this->getValue();
        $requestValueFromUrl = Mage::app()->getRequest()->getParam($requestVarName);
        $attributeCode       = $this->getFilter()->getAttributeModel()->getAttributeCode();

        if ($requestValueFromUrl && in_array($attributeCode, $helper->getMultipleAttributes())) {
            $requestVarValue = $requestValueFromUrl . $separator . $requestValue;
        } else {
            $requestVarValue = $requestValue;
        }

        $query = [
            $requestVarName => $requestVarValue,
            Mage::getBlockSingleton('page/html_pager')->getPageVarName() => null // exclude current page from urls
        ];
        return Mage::getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true, '_query' => $query]);
    }

    /**
     * Get url for remove item from filter
     *
     * @return string
     */
    public function getRemoveUrl()
    {
        $paramName  = $this->getFilter()->getRequestVar();
        $resetValue = $this->getFilter()->getResetFilterValue($this->getValue());
        $query      = [$paramName => $resetValue ? : null];
        return Mage::getUrl('*/*/*', [
            '_current' => true, '_query' => $query, '_use_rewrite' => true
        ]);
    }
}
