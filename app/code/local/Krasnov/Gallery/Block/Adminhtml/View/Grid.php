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
 * Gallery grid
 *
 * @category   Krasnov
 * @package    Krasnov_Gallery
 * @subpackage Block
 * @author     Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Gallery_Block_Adminhtml_View_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init grid
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('galleryGrid');
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
            $collection = Mage::getModel('gallery/view')->getCollection();
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

        $this->addColumn('file', [
            'header' => $this->__('File url'),
            'index'  => 'file',
            'type'   => 'text'
        ]);

        $this->addColumn('position', [
            'header' => $this->__('Position'),
            'index'  => 'position',
        ]);

        $this->addColumn('use_in_slider', [
            'header'  => $this->__('Use in slider'),
            'index'   => 'use_in_slider',
            'type'    => 'options',
            'options' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toArray(),
            'width'   => '120px'
        ]);

        $this->addColumn('created_at', [
            'header' => $this->__('Created Date'),
            'index'  => 'created_at',
            'type'   => 'date'
        ]);

        $this->addColumn('updated_at', [
            'header' => $this->__('Updated Date'),
            'index'  => 'updated_at',
            'type'   => 'date'
        ]);

        return parent::_prepareColumns();
    }

    /**
     * Get row url
     *
     * @param Varien_Object $row row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', [
            'id' => $row->getId()
        ]);
    }

    /**
     * Prepare massaction
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('massdelete_views');

        $this->getMassactionBlock()->addItem('delete', [
            'label' => $this->__('Delete'),
            'url'   => $this->getUrl('*/*/massDelete'),
        ]);
        return $this;
    }

}
