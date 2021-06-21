<?php
class Krasnov_Feedback_Model_Resource_Feedback_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Construct for collection model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('feedback/feedback');
    }

}
