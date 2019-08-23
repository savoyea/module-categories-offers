<?php

namespace Savoyea\Offers\Model\ResourceModel\Categories\Offers;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Savoyea\Offers\Model\Categories\Offers::class, \Savoyea\Offers\Model\ResourceModel\Categories\Offers::class);
    }

}
