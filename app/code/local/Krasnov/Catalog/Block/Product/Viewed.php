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
 * Recently product collection
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Block_Product_Viewed extends Mage_Reports_Block_Product_Viewed
{
    protected $_htmlClass = 'recently__viewed';

    /**
     * return class for html container
     *
     * @return string
     */
    public function getClass()
    {
        return $this->_htmlClass;
    }

    /**
     * get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->__('Recently viewed products');
    }

    /**
     * return recently product collection
     *
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductCollection()
    {
        return $this->getRecentlyViewedProducts();
    }
}
