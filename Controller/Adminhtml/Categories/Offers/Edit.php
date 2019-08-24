<?php
namespace Savoyea\Offers\Controller\Adminhtml\Categories\Offers;

class Edit extends \Magento\Backend\App\Action
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

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Savoyea_Offers::offers');
    }

    public function execute()
    {
        return $this->resultPageFactory->create();

    }
}
