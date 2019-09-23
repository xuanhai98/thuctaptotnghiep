<?php

namespace Magenest\Movie\Plugin\CheckoutCart;

use Magento\Framework\App\ObjectManager;

class Image
{
    protected $objectManager;

    protected $imageHelperFactory;

    protected $productFactory;

    protected $productRepository;

    public function __construct(
        \Magento\Catalog\Helper\ImageFactory $imageHelperFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        $this->objectManager = ObjectManager::getInstance();
        $this->imageHelperFactory = $imageHelperFactory;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
    }

    public function aroundGetItemData($subject, $proceed, $item)
    {
        $result = $proceed($item);
        $sku = $result['product_sku'];
        $product = $this->productRepository->get($sku);
        $productImageUrl = $this->imageHelperFactory->create()->init($product,'product_thumbnail_image')->getUrl();
        $result['product_image']['src'] = $productImageUrl;
        return $result;
    }
}