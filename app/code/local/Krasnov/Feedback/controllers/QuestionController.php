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
 * Feedback question front end controller
 *
 * @category   Krasnov
 * @package    Krasnov_Feedback
 * @subpackage controllers
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Feedback_QuestionController extends Mage_Core_Controller_Front_Action
{
    /**
     * @var string
     */
    protected $_modelAlias = 'feedback/feedback';

    protected $_paramName = 'feedback';
    /**
     * Save action
     *
     * @return void
     */
    public function saveAction()
    {
        $response = Mage::getModel('ajax/response');
        try {
           // die(var_dump($this->getRequest()->getPost($this->_paramName)));
            $data = $this->getRequest()->getPost($this->_paramName);
            $this->_validateData($data);
            $model = $this->_getItem($data);
            $model->save();
            $this->loadLayout();
            $response->success()->setMessage($this->_getSuccessMessage());
        } catch (Mage_Core_Exception $e) {
            $response->error()->setMessage($e->getMessage());
        } catch(Exception $e) {
            $response->error()->setMessage($e->getMessage());
            Mage::logException($e);
        }
        Mage::helper('ajax')->sendResponse($response);
    }

    /**
     * Get item
     *
     * @param array $data data
     * @return mixed
     * @throws Mage_Core_Exception
     */
    private function _getItem($data)
    {
        return Mage::getModel($this->_modelAlias)->addData($data);
    }

    /**
     * validate data
     *
     * @param array $data post data
     * @return bool
     * @throws Mage_Core_Exception
     */
    private function _validateData($data)
    {
        $validator = new Zend_Validate_EmailAddress();
        if (empty($data['email']) && empty($data['phone'])) {
            Mage::throwException($this->__('Please enter your email or phone.'));
        }
        if (!$validator->isValid($data['email']) && (empty($data['phone']) || !empty($data['email']))) {
            Mage::throwException($this->__('Please check your email address.'));
        }
        if (empty($data['name'])) {
            Mage::throwException($this->__('Please enter your name.'));
        }
        if (empty($data['question'])) {
            Mage::throwException($this->__('Please enter your question.'));
        }
        return true;
    }

    private function _getSuccessMessage()
    {
        return $this->__('Thank you for feedback. We wll сontact you soon.');
    }
}
