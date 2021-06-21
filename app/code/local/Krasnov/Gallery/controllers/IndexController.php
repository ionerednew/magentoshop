<?php
class Krasnov_Gallery_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }

}
