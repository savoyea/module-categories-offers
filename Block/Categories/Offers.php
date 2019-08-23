<?php

namespace Savoyea\Offers\Block\Categories;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Savoyea\Offers\Model\ResourceModel\Categories\Offers\CollectionFactory as OffersCollectionFactory;

class Offers extends Template
{
    protected $_registry;

    protected $_offersCollectionFactory;

    public $_storeManager;

    public function __construct(
        Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        OffersCollectionFactory $offersCollectionFactory,
        array $data = []
    ) {
        $this->_offersCollectionFactory = $offersCollectionFactory;
        $this->_registry = $registry;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getOffersCollection($currentCategory = null) {
        $collection = $this->_offersCollectionFactory->create();

        if ($currentCategory) {
            $collection->addFieldToFilter('categories', ['finset' => $currentCategory->getId()]);
        }

        $now = new \DateTime();
        $collection->addFieldToFilter('begin_date', ['lteq' => $now->format('Y-m-d H:i:s')])
            ->addFieldToFilter('end_date', ['gteq' => $now->format('Y-m-d H:i:s')]);

        return $collection;
    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }
}
