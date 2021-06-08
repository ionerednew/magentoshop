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
 * the Krasnov Gallery module to newer versions in the future.
 * If you wish to customize the Krasnov Gallery module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @copyright  Copyright (C) 2020 Krasnov
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Gallery form
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
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
