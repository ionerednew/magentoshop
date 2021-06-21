<?php
class Krasnov_Gallery_Model_View
    extends Mage_Core_Model_Abstract
{
    /** @var Krasnov_Fileuploader_Model_Uploader $_fileUploader */
    private $_fileUploader;

    const FILE_DIR = 'gallery';

    /**
     * Construct for model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('gallery/view');
    }

    /**
     * return fileuploader model
     *
     * @return Krasnov_Fileuploader_Model_Fileuploader
     */
    private function _getUploader()
    {
        if (!$this->_fileUploader) {
            $this->_fileUploader = Mage::getModel(
                'fileuploader/uploader',
                ['entity' => $this, 'file_dir' => self::FILE_DIR]
            );
        }
        return $this->_fileUploader;
    }

    /**
     * return image url
     *
     * @param string $field media field
     * @return string|null
     */
    public function getFileUrl($field = 'file')
    {
        if (!$url = $this->getData($field)) {
            return null;
        }
        return Mage::getBaseUrl('media') . $url;
    }

    /**
     * before save
     *
     * @return Mage_Core_Model_Abstract
     * @throws Exception
     */
    protected function _beforeSave()
    {
        foreach ($this->_getMediaFields() as $field) {
            $this->_getUploader()->saveFile($field);
        }
        $currentDate = Mage::getModel('core/date')->gmtDate();
        if ($this->isObjectNew()) {
            $this->setCreatedAt($currentDate);
        }
        $this->setUpdatedAt($currentDate);
        return parent::_beforeSave();
    }

    /**
     * return media fields
     *
     * @return array
     */
    private function _getMediaFields()
    {
        return ['file', 'video_preview'];
    }

    /**
     * after delete action
     *
     * @return Mage_Core_Model_Abstract
     */
    protected function _afterDelete()
    {
        $uploader = $this->_getUploader();
        foreach ($this->_getMediaFields() as $field) {
            $uploader->tryDeleteFile($field, true);
        }
        return parent::_afterDelete();
    }

    /**
     * check is file a video
     *
     * @return bool
     */
    public function isVideo()
    {
        $mimeType = mime_content_type('media/' . $this->getFile());
        $fileType = current(explode('/', $mimeType));
        return $fileType === 'video' ? true : false;
    }

}
