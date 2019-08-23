<?php
namespace Savoyea\Offers\Controller\Adminhtml\Categories\Offers;

use Savoyea\Offers\Model\Categories\Offers as Offers;


class Delete extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $offersFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Savoyea\Offers\Model\Categories\OffersFactory $offersFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->offersFactory = $offersFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $offer = $this->offersFactory->create()->load($id);

        if(!$offer)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $offer->delete();
            $this->messageManager->addSuccess(__('The offer has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete offer'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}
