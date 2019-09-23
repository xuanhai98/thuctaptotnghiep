<?php
namespace Magenest\Movie\Block\Adminhtml;
class Subscription extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Movie';
        $this->_controller = 'adminhtml_subscription';
        $this->setData(self::PARAM_BUTTON_NEW, 1);
        $this->addButton(
            'add',
            [
                'label' => 'Add New Movie',
                'onclick' => 'setLocation(\'' . $this->getUrl('movie/addmovie/index/') . '\')',
                'class' => 'add primary'
            ]
        );
        parent::_construct();
    }
}