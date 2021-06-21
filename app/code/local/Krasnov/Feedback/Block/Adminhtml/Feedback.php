<?php
class Krasnov_Feedback_Block_Adminhtml_Feedback extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Init grid container
     */
    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_feedback';
        $this->_blockGroup = 'feedback';
        $this->_headerText = $this->__('Feedback');
        $this->removeButton('add');
    }

}
