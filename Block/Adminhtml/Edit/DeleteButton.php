<?php

namespace Magenest\Movie\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        $data = [];
        if ($this->getNewsId()) {
            $data = [
                'label' => __('Delete Actor'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['actor_id' => $this->getNewsId()]);
    }
}
