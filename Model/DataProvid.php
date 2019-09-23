<?php
namespace Magenest\Movie\Model;

use Magenest\Movie\Model\ResourceModel\Subscription\CollectionFactory;

class DataProvid extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $actorCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $actorCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return [];
    }
}

