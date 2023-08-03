<?php
use Magento\Framework\App\Bootstrap;
require __DIR__ . '/../app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');



// $orderId=18;

// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
// $order = $objectManager->create('\Magento\Sales\Model\OrderRepository')->get($orderId);
// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
// $orderInfo = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($orderId);
// echo "<pre>";
// print_r(get_class_methods($orderInfo));
//       echo $orderInfo->getId();
// die;


$orderIncrementId=000000233;
$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$orderInfo = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($orderIncrementId);

$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
$order = $objectManager->create('\Magento\Sales\Model\OrderRepository')->get('98');

$orderItems=$order->getAllItems();
foreach ($orderItems as $item) { 
  $productsku = $item->getSku(); 
  echo $productsku;
  $product = $objectManager->get('\Magento\Catalog\Model\ProductRepository')->get($productsku);
  $myAttributeValue = $product->getMyAttribute();
} 
  
  if($myAttributeValue)
  {
   echo 'true is represented as ';
   echo ($myAttributeValue);
}
else
{
   echo 'false is represented as ';
   echo ($myAttributeValue);
}
