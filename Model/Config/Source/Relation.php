<?php
namespace Magenest\Movie\Model\Config\Source;
class Relation implements
    \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => null,
                'label' => __('--Please Select--')
            ],
            [
                'value' => 'show',
                'label' => __('Show')
            ],
            [
                'value' => 'not_show',
                'label' => __('Not-Show')
            ],
        ];
    }
}