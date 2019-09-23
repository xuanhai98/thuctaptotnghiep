<?php
namespace Magenest\Movie\Controller\Adminhtml\Addactor;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Movie::addactor');
    $resultPage->addBreadcrumb(__('Movie'),__('Movie'));
$resultPage->addBreadcrumb(__('Add Actor'),__('Add Actor'));
$resultPage->getConfig()->getTitle()->prepend(__('News Actor'));
return $resultPage;
}
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie::addactor');
}
}