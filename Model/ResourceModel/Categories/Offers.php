<?php

namespace Savoyea\Offers\Model\ResourceModel\Categories;

class Offers extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('categories_offers', 'entity_id');
    }
}
