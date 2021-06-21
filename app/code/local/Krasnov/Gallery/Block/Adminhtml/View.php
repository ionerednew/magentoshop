<?php
class Krasnov_Gallery_Block_Adminhtml_View extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Construct for container grid model
     *
     * @return void
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_view';
        $this->_blockGroup = 'gallery';
        $this->_headerText = $this->__('Gallery views');
        $this->_addButtonLabel = $this->__('Add view');
        parent::__construct();
    }

}
