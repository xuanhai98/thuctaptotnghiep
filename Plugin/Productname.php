<?php
namespace Magenest\Movie\Plugin;
class Productname
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
        return "".$result; // Offer will add before Product Name
    }
}