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
 * Category layer
 *
 * @category   Krasnov
 * @package    Krasnov_Catalog
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Catalog_Block_Layer_Category extends Mage_Catalog_Block_Layer_View
{
    /**
     * Initialize blocks names
     *
     * @return void
     */
    protected function _initBlocks()
    {
        parent::_initBlocks();
        $this->_categoryBlockName = 'krasnov_catalog/layer_filter_category';
    }

    /**
     * Get filters
     *
     * @return array
     */
    public function getFilters()
    {
        $filters = [];
        if ($categoryFilter = $this->_getCategoryFilter()) {
            $filters[] = $categoryFilter;
        }
        return $filters;
    }
}
