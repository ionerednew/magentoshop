<?php
class Krasnov_Catalog_Helper_Data extends Mage_Core_Helper_Data
{
    private $_catalogCategory;

    const BESTSELLER_CATEGORY_ID_PATH_XML = 'catalog/navigation/bestseller_category';
    const CATALOG_CATEGORY_ID_PATH_XML = 'catalog/navigation/catalog_category';

    /**
     * return bestseller category id
     *
     * @return int
     */
    public function getBestsellerCategoryId()
    {
        return Mage::getStoreConfig(self::BESTSELLER_CATEGORY_ID_PATH_XML);
    }

    /**
     * return catalog category id
     *
     * @return int
     */
    public function getCatalogCategoryId()
    {
        return Mage::getStoreConfig(self::CATALOG_CATEGORY_ID_PATH_XML);
    }

    /**
     * get catalog url
     *
     * @return string
     */
    public function getCatalogUrl()
    {
        return $this->_getCatalogCategory()->getUrl();
    }

    /**
     * return catalog category
     *
     * @return Mage_Catalog_Model_Category
     */
    private function _getCatalogCategory()
    {
        if (!$this->_catalogCategory) {
            $this->_catalogCategory = Mage::getModel('catalog/category')->load($this->getCatalogCategoryId());
        }
        return $this->_catalogCategory;
    }

    /**
     * return request path
     *
     * @return string
     */
    public function getCatalogRequestPathUrl()
    {
        return $this->_getCatalogCategory()->getRequestPath();
    }
}
