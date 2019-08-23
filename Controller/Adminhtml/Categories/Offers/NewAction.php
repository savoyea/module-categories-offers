<?php
namespace Savoyea\Offers\Controller\Adminhtml\Categories\Offers;
use Magento\Backend\App\Action;
use Savoyea\Offers\Model\Categories\Offers as Offers;

class NewAction extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
