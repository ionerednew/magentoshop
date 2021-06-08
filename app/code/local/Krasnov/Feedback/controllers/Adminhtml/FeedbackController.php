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
 * Feedback adminhtml controller
 *
 * @category   Krasnov
 * @package    Krasnov_Feedback
 * @subpackage controllers
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Feedback_Adminhtml_FeedbackController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Show grid
     *
     * @return void
     */
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

    /**
     * Load grid for ajax action
     *
     * @return void
     */
    public function gridAction()
    {
        $this->loadLayout()->renderLayout();
    }


    /**
     * delete entity
     *
     * @return void
     */
    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $this->_getFeedback()->load($id)->delete();
                $this->_getSession()->addSuccess($this->__('Successfully removed.'));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $this->_redirect('*/*/edit', ['id' => $id]);
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * massdelete action
     *
     * @return void
     */
    public function massDeleteAction()
    {
        $entitiesIds = $this->getRequest()->getParam('massdelete_feedbacks', null);
        if (!(is_array($entitiesIds) && sizeof($entitiesIds) > 0)) {
            $this->_getSession()->addError($this->__('Please select feedbacks.'));
            return;
        }
        try {
            $entity = $this->_getFeedback();
            foreach ($entitiesIds as $entityId) {
                $entity->setId($entityId)->delete();
            }
            $this->_getSession()
                ->addSuccess($this->__('Total of %d feedbacks have been deleted', sizeof($entitiesIds)));
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }

    /**
     * allow controller
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }

    private function _getFeedback()
    {
        return Mage::getModel('feedback/feedback');
    }

}
