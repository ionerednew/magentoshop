<?php
class Krasnov_Gallery_Block_Adminhtml_View_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * prepare form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     * @throws Exception
     */
    protected function _prepareForm()
    {
        $view = Mage::registry('current_view');

        $form = new Varien_Data_Form([
            'id'      => 'edit_form',
            'action'  => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
            'method'  => 'post',
            'enctype' => 'multipart/form-data'
        ]);

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => $this->__('Main info'),
            'class'  => 'fieldset-wide'
        ]);

        $fieldset->addField('file', 'file', $this->_getFileField($view));

        $fieldset->addField('use_in_slider', 'select', [
            'name' => 'use_in_slider',
            'label' => $this->__('Use in slider'),
            'values' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toOptionArray(),
        ]);

        $fieldset->addField('position', 'text', [
            'name'  => 'position',
            'label' => $this->__('Position'),
        ]);



        $form->setValues($view->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * return view field
     *
     * @param Krasnov_Gallery_Model_View $view view
     * @return array
     */
    private function _getFileField($view)
    {
        $videoField =
            [
                'label' => $this->__('File'),
                'name' => 'file'
            ];
        if ($file = $view->getFile()) {
            $videoField['note'] = $this->__("The <a href ='%s'>file</a> is attached to this view. " .
                "To delete <input type='checkbox' name='file[delete]' value ='1'>", $view->getFileUrl());
        }
        return $videoField;
    }
}
