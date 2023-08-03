<?php
namespace Customer\Tab\Plugin;

class Product extends \Magento\Catalog\Block\Product\View\Attributes
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $attribute = $subject->getResource()->getAttribute('price_kg'); 
        $p = $attribute ->getFrontend()->getValue($subject);
   
        $result += $p;
        return $result;

      
    }
   
     
   
}