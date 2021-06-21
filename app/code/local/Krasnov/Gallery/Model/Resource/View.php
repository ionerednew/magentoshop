<?php
class Krasnov_Gallery_Model_Resource_View extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Construct for model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('gallery/view', 'entity_id');
    }


}
