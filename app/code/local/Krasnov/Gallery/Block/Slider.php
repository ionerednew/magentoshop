<?php
class Krasnov_Gallery_Block_Slider extends Mage_Core_Block_Template
{
    /**
     * get slider gallery
     *
     * @return Krasnov_Gallery_Model_Resource_View_Collection
     */
    public function getSliderGallery()
    {
        return Mage::getModel('gallery/view')->getCollection()
            ->addPositionFilter()
            ->addSliderFilter();
    }
}
