<?php
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
