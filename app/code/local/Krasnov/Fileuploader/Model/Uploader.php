<?php
class Krasnov_Fileuploader_Model_Uploader
{
    private $_entity;
    private $_fileDir;

    /**
     * Krasnov_Fileuploader_Model_Uploader constructor.
     *
     * @param array $arguments arguments
     */
    public function __construct($arguments)
    {
        $this->_entity = $arguments['entity'];
        $this->_fileDir = $arguments['file_dir'];
    }

    /**
     * save file
     *
     * @param string $postFieldName file field name. For example field of entity in database 'mobile_image'
     * @return $this
     * @throws Exception
     */
    public function saveFile($postFieldName)
    {
        $entity = $this->_getCurrentEntity();
        $isDeleted = Mage::app()->getRequest()->getPost()[$postFieldName]['delete'];
        if ($_FILES[$postFieldName]['name']) {
            $uploader = new Varien_File_Uploader($postFieldName);
            $uploader->setFilesDispersion(false);
            $uploader->setAllowRenameFiles(true);
            $result = $uploader
                ->save(Mage::getBaseDir('media') . DS . $this->_getEntityFileDir(), $_FILES[$postFieldName]['name']);
            if ($result) {
                $this->tryDeleteFile($postFieldName);
                $entity->setData($postFieldName, $this->_getEntityFileDir() . DS . $result['file']);
            }
        } else if ($isDeleted) {
            $this->tryDeleteFile($postFieldName, true);
            $entity->setData($postFieldName, '');
        } else if (empty($_FILES[$postFieldName]['name'])) {
            $postFileData = $entity->getData($postFieldName);
            $entity->setData($postFieldName, isset($postFileData['value']) ? $postFileData['value'] : $postFileData) ;
        }
        return $this;
    }

    /**
     * delete file with field name postFileName
     *
     * @param string  $postFieldName  field name
     * @param boolean $deleteForcibly is delete forcibly
     * @return $this
     */
    public function tryDeleteFile($postFieldName, $deleteForcibly = false)
    {
        if (($entity = $this->_getCurrentEntity())->getData($postFieldName) &&
            ($entity->getOrigData($postFieldName) != $entity->getData($postFieldName) || $deleteForcibly)) {
            unlink(Mage::getBaseDir('media') . DS . $entity->getOrigData($postFieldName));
        }
        return $this;
    }

    /**
     * return entity
     *
     * @return object
     */
    private function _getCurrentEntity()
    {
        return $this->_entity;
    }

    /**
     * return file dir
     *
     * @return string
     */
    private function _getEntityFileDir()
    {
        return $this->_fileDir;
    }
}
