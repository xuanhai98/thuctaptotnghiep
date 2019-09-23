<?php
//namespace Magenest\Movie\Model\ResourceModel;
//class Subscription extends
//    \Magento\Framework\Model\AbstractModel {
//const STATUS_PENDING = 'pending';
//const STATUS_APPROVED = 'approved';
//const STATUS_DECLINED = 'declined';
//    public function __construct(
//        \Magento\Framework\Model\Context $context,
//        \Magento\Framework\Registry $registry,
//        \Magento\Framework\Model\ResourceModel\AbstractResource
//        $resource = null,
//        \Magento\Framework\Data\Collection\AbstractDb
//        $resourceCollection = null,
//        array $data = []
//    ) {parent::__construct($context, $registry, $resource,
//        $resourceCollection, $data);
//    }
//    public function _construct() {
//        $this->_init
//        ('Magenest\Movie\Model\ResourceModel\Subscription');
//    }
//}


namespace Magenest\Movie\Model\ResourceModel;
class Actor extends
    \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magenest_actor',
            'actor_id');
    }
}