<?php
class Krasnov_Feedback_Model_Feedback
    extends Mage_Core_Model_Abstract
{
    /**
     * Construct for model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('feedback/feedback');
    }

    /**
     * before save
     *
     * @return Mage_Core_Model_Abstract
     * @throws Exception
     */
    protected function _beforeSave()
    {
        $currentDate = Mage::getModel('core/date')->gmtDate();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($currentDate);
        }
        return parent::_beforeSave();
    }
}
