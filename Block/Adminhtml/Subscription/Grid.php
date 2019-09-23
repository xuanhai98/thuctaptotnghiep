<?php
namespace Magenest\Movie\Block\Adminhtml\Subscription;
use Magento\Backend\Block\Widget\Grid as WidgetGrid;
class Grid extends
    \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_subscriptionCollection;
    public function __construct(\Magento\Backend\Block\Template\Context $context,\Magento\Backend\Helper\Data $backendHelper,\Magenest\Movie\Model\ResourceModel\Subscription\Collection $subscriptionCollection,array $data = []) {
        $this->_subscriptionCollection = $subscriptionCollection;parent::__construct($context, $backendHelper,$data);
        $this->setEmptyText(__('No Subscriptions Found'));
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
            'movie_id',
            ['header' => __('ID'),
                'index' => 'movie_id',
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name',
            ]
        );
        $this->addColumn(
            'description',
            [
                'header' => __('Description'),
                'index' => 'description',
            ]
        );
        $this->addColumn(
            'rating',
            [
                'header' => __('Rating'),
                'index' => 'rating',
            ]
        );
        $this->addColumn(
            'director_id',
            [
                'header' => __('Director id'),
                'index' => 'director_id',
            ]
        );
        return $this;
    }}