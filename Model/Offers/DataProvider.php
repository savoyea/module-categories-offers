<?php
namespace Savoyea\Offers\Model\Offers;

use Savoyea\Offers\Model\ResourceModel\Categories\Offers\CollectionFactory;
use Savoyea\Offers\Model\Categories\Offers;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;
    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $offersCollectionFactory,
        StoreManagerInterface $_storemanager,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $offersCollectionFactory->create();
        $this->storeManager = $_storemanager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $offer) {
            $this->loadedData[$offer->getId()] = $offer->getData();
            if ($offer->getCategories()) {
                $data['categories'] = explode(',', $offer->getCategories());
                $fullData = $this->loadedData;
                $this->loadedData[$offer->getId()] = array_merge($fullData[$offer->getId()], $data);
            }
            if ($offer->getImage()) {
                $m['image'][0]['name'] = $offer->getImage();
                $m['image'][0]['url'] = $this->getMediaUrl() . $offer->getImage();
                $fullData = $this->loadedData;
                $this->loadedData[$offer->getId()]['offer'] = array_merge($fullData[$offer->getId()], $m);
            } else {
                $this->loadedData[$offer->getId()]['offer'] = $offer->getData();
            }
        }
        return $this->loadedData;
    }

    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'categories/tmp/offers/';
        return $mediaUrl;
    }
}
