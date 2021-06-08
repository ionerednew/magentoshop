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
 * Feedback grid
 *
 * @category   Krasnov
 * @package    Krasnov_Feedback
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Feedback_Block_Adminhtml_Feedback_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init grid
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('feedbackGrid');
        $this->setDefaultSort('entity_id');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * prepare collection for grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        if (!$this->getCollection()) {
            $collection = Mage::getModel('feedback/feedback')->getCollection();
            $this->setCollection($collection);
        }
        return parent::_prepareCollection();
    }


    /**
     * Prepare columns for grid
     *
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', [
            'header' => $this->__('ID'),
            'index'  => 'entity_id',
            'type'   => 'number',
        ]);

        $this->addColumn('name', [
            'header' => $this->__('Name'),
            'index'  => 'name',
            'type'   => 'text'
        ]);

        $this->addColumn('email', [
            'header' => $this->__('E-mail'),
            'index'  => 'email',
            'type'   => 'text'
        ]);

        $this->addColumn('phone', [
            'header' => $this->__('Phone'),
            'index'  => 'phone',
            'type'   => 'text'
        ]);

        $this->addColumn('question', [
            'header' => $this->__('Question'),
            'index'  => 'question',
            'type'   => 'text'
        ]);

        $this->addColumn('created_at', [
            'header' => $this->__('Created Date'),
            'index'  => 'created_at',
            'type'   => 'date'
        ]);

        return parent::_prepareColumns();
    }


    /**
     * Prepare massaction
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('massdelete_feedbacks');

        $this->getMassactionBlock()->addItem('delete', [
            'label' => $this->__('Delete'),
            'url'   => $this->getUrl('*/*/massDelete'),
        ]);
        return $this;
    }

}
