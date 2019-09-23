<?php
namespace Magenest\Movie\Model\Config\Source;
class Director implements
    \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('--Please Select Director--')
            ],
            [
                'value' => 'hai',
                'label' => __('Phung Xuan Hai')
            ],
            [
                'value' => 'duy',
                'label' => __('To Dinh Duy')
            ],
        ];
    }
}