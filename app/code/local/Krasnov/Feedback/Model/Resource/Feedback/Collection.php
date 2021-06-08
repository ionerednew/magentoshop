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
 * the Krasnov Feedback module to newer versions in the future.
 * If you wish to customize the Krasnov Feedback module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Feedback
 * @copyright  Copyright (C) 2020 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Feedback resource collection model
 *
 * @category   Krasnov
 * @package    Krasnov_Feedback
 * @subpackage Model
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Feedback_Model_Resource_Feedback_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Construct for collection model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('feedback/feedback');
    }

}
