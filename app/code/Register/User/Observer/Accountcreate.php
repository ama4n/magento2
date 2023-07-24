<?php

namespace Register\User\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Accountcreate implements ObserverInterface
{
   
    protected $_customerFactory;
    protected $_customerRepository;
    protected $request;
    protected $customerRepository;

    public function __construct(
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\RequestInterface $request,
        CustomerRepositoryInterface $customerRepository,
    ) {
        $this->_customerFactory = $customerFactory;
        $this->_logger = $logger;
        $this->request = $request;
        $this->customerRepository = $customerRepository;
    }


    public function execute(Observer  $observer)
    {
        $this->_logger->info("Observer CustomerRegisterObserver Loaded !");
        $data = $this->request->getParams();
        // echo "dsfsdfsfs"; die;

        $var= $this->request->getParams('phone');
       
        $event = $observer->getEvent();
        $customerData = $event->getCustomer();
        $customer = $this->_customerFactory->create()->load($customerData->getId());
       
        $customer->setData('phone', $var['phone']);
        $customer->save();        
    }
}



// namespace Register\User\Observer;;

// use Magento\Framework\Event\ObserverInterface;
// use Magento\Framework\Event\Observer;
// use Magento\Customer\Api\CustomerRepositoryInterface;

// class Accountcreate implements ObserverInterface
// {
//     /** @var CustomerRepositoryInterface */
//     protected $customerRepository;

//     /**
//      * @param CustomerRepositoryInterface $customerRepository
//      */
//     public function __construct(
//         CustomerRepositoryInterface $customerRepository
//     ) {
//         $this->customerRepository = $customerRepository;
//     }

//     /**
//      * Manages redirect
//      */
//     public function execute(Observer $observer)
//     {
//         $accountController = $observer->getAccountController();
//         $customer = $observer->getCustomer();
//         $request = $accountController->getRequest();
//         echo "<pre>";
//         print_r($request);
//         $customer_number = $request->getParam('phone');
//         $customer->setCustomAttribute('phone', $customer_number);
//         $this->customerRepository->save($customer);
//     }
// }