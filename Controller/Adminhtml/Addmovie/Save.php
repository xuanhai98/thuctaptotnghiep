<?php
namespace Magenest\Movie\Controller\Adminhtml\Addmovie;
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
        $id = $this->getRequest()->getParam('movie_id');

        $model = $this->_objectManager->create(\Magenest\Movie\Model\Subscription::class)->load($id);
        if (!$model->getId() && $id) {
        $this->messageManager->addErrorMessage(__('This Movie no longer exists.'));
        return $resultRedirect->setPath('*/*/');
}

$model->setData($data);

try {
$model->save();
$this->messageManager->addSuccessMessage(__('You saved the Movie.'));
$this->dataPersistor->clear('addmovie');

if ($this->getRequest()->getParam('back')) {
return $resultRedirect->setPath('*/*/', ['movie_id' => $model->getId()]);
}
return $resultRedirect->setPath('*/*/');
} catch (LocalizedException $e) {
$this->messageManager->addErrorMessage($e->getMessage());
} catch (\Exception $e) {
$this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Move.'));
}

$this->dataPersistor->set('addmovie', $data);
return $resultRedirect->setPath('*/*/', ['movie_id' => $this->getRequest()->getParam('movie_id')]);
}
return $resultRedirect->setPath('*/*/');
}
}