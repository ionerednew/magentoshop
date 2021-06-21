<?php
class Krasnov_Catalog_Block_Category_View extends Mage_Catalog_Block_Category_View
{
    const SHARES_CATEGORY_ID = 8;

    /**
     * Retrieve current category model object
     *
     * @return Mage_Catalog_Model_Category
     */
    public function getCurrentCategory()
    {
        $category = Mage::getModel('catalog/category')->load(self::SHARES_CATEGORY_ID);
        Mage::register('current_category', $category, true);
        return $category;
    }

}
