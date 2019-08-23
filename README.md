# Magento 2 Categories Offers
Magento 2 Module Add Offers to Categories

## 1. How to install

## ✓ Install via composer (recommend)
Run the following command in Magento 2 root folder:

```
composer require savoyea/module-categories-offers:dev-master
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:clean
```