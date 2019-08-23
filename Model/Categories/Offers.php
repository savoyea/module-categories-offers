<?php

namespace Savoyea\Offers\Model\Categories;

class Offers extends \Magento\Framework\Model\AbstractModel {

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Savoyea\Offers\Model\ResourceModel\Categories\Offers::class);
    }
}
