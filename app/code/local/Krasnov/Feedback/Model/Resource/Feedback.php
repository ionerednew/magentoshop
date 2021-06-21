<?php
class Krasnov_Feedback_Model_Resource_Feedback extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Construct for model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('feedback/feedback', 'entity_id');
    }
}
