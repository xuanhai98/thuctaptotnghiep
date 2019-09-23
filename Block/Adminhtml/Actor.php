<?php
namespace Magenest\Movie\Block\Adminhtml;
class Actor extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Actor';
        $this->_controller = 'adminhtml_actor';

        $this->setData(self::PARAM_BUTTON_NEW, 1);
        $this->addButton(
            'add',
            [
                'label' => 'Add New Actor',
                'onclick' => 'setLocation(\'' . $this->getUrl('movie/addactor/index/') . '\')',
                'class' => 'add primary'
            ]
        );
        parent::_construct();

    }

}