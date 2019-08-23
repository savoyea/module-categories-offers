<?php
namespace Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Supprimer'),
            'on_click' => 'deleteConfirm(\'' . __('Do you really want to delete this offer ?') . '\', \'' . $this->getDeleteUrl() . '\')',
            'class' => 'delete',
            'sort_order' => 20
        ];
    }

    public function getDeleteUrl()
    {
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $url = $urlInterface->getCurrentUrl();

        $parts = explode('/', parse_url($url, PHP_URL_PATH));

        $id = $parts[6];

        return $this->getUrl('*/*/delete', ['id' => $id]);
    }
}
