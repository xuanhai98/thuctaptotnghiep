<?php
namespace Magenest\Movie\Controller\Adminhtml\Addactor;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
        $id = $this->getRequest()->getParam('actor_id');

        $model = $this->_objectManager->create(\Magenest\Movie\Model\Actor::class)->load($id);
        if (!$model->getId() && $id) {
        $this->messageManager->addErrorMessage(__('This Actor no longer exists.'));
        return $resultRedirect->setPath('*/*/');
}

$model->setData($data);

try {
$model->save();
$this->messageManager->addSuccessMessage(__('You saved the Actor.'));
$this->dataPersistor->clear('addactor');

if ($this->getRequest()->getParam('back')) {
return $resultRedirect->setPath('*/*/edit', ['actor_id' => $model->getId()]);
}
return $resultRedirect->setPath('*/*/');
} catch (LocalizedException $e) {
$this->messageManager->addErrorMessage($e->getMessage());
} catch (\Exception $e) {
$this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Actor.'));
}

$this->dataPersistor->set('addactor', $data);
return $resultRedirect->setPath('*/*/', ['actor_id' => $this->getRequest()->getParam('actor_id')]);
}
return $resultRedirect->setPath('*/*/');
}
}