<?php
echo "jjjjj";
die;
use Magento\Framework\App\Bootstrap;
require '/../app/bootstrap.php';
$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');
echo 'Test Script';