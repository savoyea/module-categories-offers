<?php
namespace Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Sauvegarder'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
            'sort_order' => 90
        ];
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save', []) ;
    }
}
