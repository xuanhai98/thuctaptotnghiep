<?php
namespace Magenest\Movie\Block\Adminhtml\Director;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;
class Grid extends
    \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_subscriptionCollection;
    public function __construct(\Magento\Backend\Block\Template\Context $context,\Magento\Backend\Helper\Data $backendHelper,\Magenest\Movie\Model\ResourceModel\Actor\Collection $subscriptionCollection,array $data = []) {
        $this->_subscriptionCollection = $subscriptionCollection;parent::__construct($context, $backendHelper,$data);
        $this->setEmptyText(__('No Director Found'));
    }
    protected function _prepareCollection()
    {
        $this->setCollection($this->_subscriptionCollection);
        return parent::_prepareCollection();
}
    /**
     * Prepare grid columns
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'director_id',
            ['header' => __('ID'),
                'index' => 'actor_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name',
            ]
        );
        return $this;
    }
}