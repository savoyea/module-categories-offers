<?php
namespace Savoyea\Offers\Controller\Adminhtml\Categories\Offers;

class Save extends \Magento\Backend\App\Action
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

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Savoyea_Offers::offers');
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if($data)
        {
            $data = $data['offer'];
            try{
                if (isset($data['entity_id'])) {
                    $id = $data['entity_id'];
                    $offer = $this->offersFactory->create()->load($id);
                } else {
                    $offer = $this->offersFactory->create();
                }

                $data = array_filter($data, function($value) {return $value !== ''; });

                if (isset($data['image'][0]['name'])) {
                    $data['image'] = $data['image'][0]['name'];
                } else {
                    $data['image'] = null;
                }

                if (isset($data['categories'])) {
                    $data['categories'] = implode(',', $data['categories']);
                } else {
                    $data['categories'] = null;
                }
                $offer->setData($data);
                $offer->save();
                $this->messageManager->addSuccess(__('The offer has been correctly saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/*/edit', ['id' => $offer->getId()]);
            }
            catch(\Exception $d)
            {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}
