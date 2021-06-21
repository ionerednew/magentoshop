<?php
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
