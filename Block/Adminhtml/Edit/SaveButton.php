<?php
namespace Magenest\Movie\Block\Adminhtml\Edit;

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Magento\Customer\Block\Adminhtml\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
        return $data;
    }
}