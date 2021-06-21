<?php
class Krasnov_Gallery_Block_Page extends Mage_Core_Block_Template
{
    /**
     * get gallery page
     *
     * @return Krasnov_Gallery_Model_Resource_View_Collection
     */
    public function getGalleryCollection()
    {
        return Mage::getModel('gallery/view')->getCollection()
            ->addPositionFilter();
    }
}
