<?php
namespace Magenest\Movie\Plugin;
class ProductPlugin
{
    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
    {
        return ['(' . $name . ')'];
    }
}