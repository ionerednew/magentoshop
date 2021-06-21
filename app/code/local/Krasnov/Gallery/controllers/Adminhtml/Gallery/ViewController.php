<?php
class Krasnov_Gallery_Adminhtml_Gallery_ViewController extends Mage_Adminhtml_Controller_Action
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
     * edit action
     *
     * @throws Mage_Core_Exception
     * @return void
     */
    public function editAction()
    {
        Mage::register(
            'current_view',
            $this->_getView()->load($this->getRequest()->getParam('id'))
        );
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * new action
     *
     * @return void
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * save entity
     *
     * @return void
     */
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $entityId = $this->getRequest()->getParam('id');
                $this->_getView()->load($entityId)->addData($data)->save();
                $this->_getSession()->addSuccess($this->__('Successfully saved.'));
                $this->_getSession()->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $this->_getSession()->setFormData($data);
                $this->_redirect('*/*/edit', [
                    'id' => $entityId
                ]);
            }
            return;
        }
        $this->_getSession()->addError($this->__('Unable to find item to save.'));
        $this->_redirect('*/*/');
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
                $this->_getView()->load($id)->delete();
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
        $entitiesIds = $this->getRequest()->getParam('massdelete_views', null);
        if (!(is_array($entitiesIds) && sizeof($entitiesIds) > 0)) {
            $this->_getSession()->addError($this->__('Please select views.'));
            return;
        }
        try {
            $entity = $this->_getView();
            foreach ($entitiesIds as $entityId) {
                $entity->load($entityId)->delete();
            }
            $this->_getSession()
                ->addSuccess($this->__('Total of %d views have been deleted', sizeof($entitiesIds)));
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }

    /**
     * return lesson model
     *
     * @return Krasnov_Gallery_Model_View
     */
    private function _getView()
    {
        return Mage::getModel('gallery/view');
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

}
