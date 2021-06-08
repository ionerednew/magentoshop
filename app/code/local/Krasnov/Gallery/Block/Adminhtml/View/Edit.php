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
 * the Krasnov Gallery module to newer versions in the future.
 * If you wish to customize the Krasnov Gallery module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @copyright  Copyright (C) 2020 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Gallery form container
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Gallery_Block_Adminhtml_View_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Init edit page
     *
     * @return void
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_view';
        $this->_blockGroup = 'gallery';
        parent::__construct();
    }

    /**
     * Get header text for page
     *
     * @return void
     */
    public function getHeaderText()
    {
        $view = Mage::registry('current_view');
        return $view && $view->getId() ? $this->__('Edit view') : $this->__('Add new view');
    }

}
