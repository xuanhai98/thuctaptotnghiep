<?php
namespace Magenest\Movie\Block\Adminhtml;
class Director extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Director';
        $this->_controller = 'adminhtml_director';

        $this->setData(self::PARAM_BUTTON_NEW, 1);
        $this->addButton(
            'add',
            [
                'label' => 'Add New Director',
                'onclick' => 'setLocation(\'' . $this->getUrl('movie/adddirector/index/') . '\')',
                'class' => 'add primary'
            ]
        );
        parent::_construct();
    }
}