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
 * Toolbar
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Block_Product_List_Toolbar extends Mage_Catalog_Block_Product_List_Toolbar
{
    const PRODUCT_LIMIT_ON_PAGE = 24;

    /**
     * get limit
     *
     * @return int
     */
    public function getLimit()
    {
        return self::PRODUCT_LIMIT_ON_PAGE;
    }

    /**
     * Render pagination HTML
     *
     * @return string
     */
    public function getPagerHtml()
    {
        $pagerBlock = $this->getChild('product_list_toolbar_pager');
        $collection = $this->getCollection();
        if ($collection->getSize() <= $this->getLimit() || !$pagerBlock instanceof Varien_Object) {
            return '';
        }

        /* @var $pagerBlock Mage_Page_Block_Html_Pager */
        $pagerBlock->setAvailableLimit($this->getAvailableLimit());
        $pagerBlock->setUseContainer(false)
            ->setShowPerPage(false)
            ->setShowAmounts(false)
            ->setLimitVarName($this->getLimitVarName())
            ->setPageVarName($this->getPageVarName())
            ->setLimit($this->getLimit())
            ->setFrameLength(Mage::getStoreConfig('design/pagination/pagination_frame'))
            ->setJump(Mage::getStoreConfig('design/pagination/pagination_frame_skip'))
            ->setCollection($collection);

        return $pagerBlock->toHtml();
    }
}
