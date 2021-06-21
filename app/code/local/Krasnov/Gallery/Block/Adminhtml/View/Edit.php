<?php
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
