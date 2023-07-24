<?php

namespace Register\User\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Exception;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\OrderRepositoryInterface;

class SalesAddColumn implements ObserverInterface
{
    protected $_customerRepository;
    protected $request;
    protected $customerRepository;
    protected  $checkoutSession;
    protected $searchCriteriaBuilder;
    protected $orderRepository;

    public function __construct(
      
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Checkout\Model\Session $checkoutSession,
        CustomerRepositoryInterface $customerRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        OrderRepositoryInterface $orderRepository
    ) {
        
        $this->logger = $logger;
        $this->request = $request;
        $this->customerRepository = $customerRepository;
        $this->checkoutSession = $checkoutSession;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderRepository = $orderRepository;
        
    }


    public function execute(Observer  $observer)
    {


        $order = $observer->getEvent()->getOrder();
        $orderId = $order->getId();
       

       
         foreach($order->getAllItems() as $orderItem){
         $productsku = $orderItem->getSku(); 
      
        
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $product = $objectManager->get('\Magento\Catalog\Model\ProductRepository')->get($productsku);
        $myAttributeValue = $product->getMyAttribute();
    } 
        //  $this->logger->info($myAttributeValue);
        $order->setCustomColumn($myAttributeValue);
        $order->save(); 
    }

}

