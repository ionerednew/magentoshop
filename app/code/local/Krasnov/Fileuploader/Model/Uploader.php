<?php
/**
 * Krasnov Fileuploader extension for Magento
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
 * the Krasnov Fileuploadermodule to newer versions in the future.
 * If you wish to customize the Krasnov Fileuploader module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category Krasnov
 * @package Krasnov_Fileuploader
 * @copyright Copyright (C) 2020 Krasnov
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

/**
 *  Fileuploader model
 *
 * @category    Krasnov
 * @package     Krasnov_Fileuploader
 * @subpackage  Model
 * @author      Ivan Krasnov <scenox1010@gmail.com>
 */
class Krasnov_Fileuploader_Model_Uploader
{
    private $_entity;
    private $_fileDir;

    /**
     * Krasnov_Fileuploader_Model_Fileuploader constructor.
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
