<?php
namespace Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Savoyea\Offers\Block\Adminhtml\Categories\Offers\Edit\GenericButton;

class ResetButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'on_click' => 'javascript: location.reload();',
            'class' => 'reset',
            'sort_order' => 30
        ];
    }
}
