<?php
class Krasnov_Gallery_Model_Resource_View_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Construct for collection model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('gallery/view');
    }

    /**
     * add sort by position
     *
     * @return Krasnov_Gallery_Model_Resource_View_Collection
     */
    public function addPositionFilter()
    {
        return $this->setOrder('position', self::SORT_ORDER_ASC);
    }

    /**
     * filter only main page
     *
     * @return Krasnov_Gallery_Model_Resource_View_Collection
     */
    public function addSliderFilter()
    {
        return $this->addFieldToFilter('use_in_slider', true);
    }

}
