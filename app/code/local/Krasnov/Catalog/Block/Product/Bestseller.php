<?php
class Krasnov_Catalog_Block_Product_Bestseller extends Mage_Reports_Block_Product_Abstract
{
    protected $_htmlClass = 'bestseller';

    /**
     * get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->__('Bestsellers');
    }

    /**
     * return class for html container
     *
     * @return string
     */
    public function getClass()
    {
        return $this->_htmlClass;
    }

    /**
     * return bestseller collection
     *
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    public function getProductCollection()
    {
        $collection = Mage::getModel('catalog/category')
            ->load($this->helper('krasnov_catalog')->getBestsellerCategoryId())
            ->getProductCollection()
            ->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
            ->addPriceData();
        Mage::getSingleton('catalog/product_visibility')
            ->addVisibleInSiteFilterToCollection($collection);
        return $collection;
    }
}
