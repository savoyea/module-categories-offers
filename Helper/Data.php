<?php

namespace Savoyea\Offers\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const CATEGORIES_OFFERS_PATH_UPLOAD = 'categories/tmp/offers/';

    public function getCategoriesOffersImagePathUpload() {
        return self::CATEGORIES_OFFERS_PATH_UPLOAD;
    }
}
