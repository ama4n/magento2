<?php

namespace Register\User\Controller\Product;
// use Magento\Framework\Message\ManagerInterface;

use Exception;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Framework\View\Element\Template\Context;


class Product extends \Magento\Framework\App\Action\Action
{

	// protected $helperData;
    // protected $_request;
    // protected $messageManager;
    // protected $resultFactory;


	// public function __construct(
	// 	\Magento\Framework\App\Action\Context $context,
    //     \Magento\Framework\App\Request\Http $request,
	// 	\Register\User\Helper\Data $helperData,
    //     \Magento\Framework\Message\ManagerInterface $messageManager,
    //     \Magento\Framework\Controller\ResultFactory $resultFactory,

	// )
	// {
	// 	$this->helperData = $helperData;
    //     $this->_request = $request;
    //     $this->messageManager  = $messageManager;
    //     $this->resultFactory = $resultFactory;
	// 	return parent::__construct($context);
	// }

	// public function execute()
	// {
        
	// 	$config= $this->helperData->getGeneralConfig('display_tex');
    //     $confignew = explode(',',$config);
      
    //     $id = $this->_request->getParam('remarks');
    //     $input = explode(',',$id);
    //     $matchdata=[];
    //     $notmatchdata=[];
    //     foreach ($input as $element) {
        
    //         if(in_array($element,$confignew)){
    //            $matchdata[] = $element;
              
   
    //     }
    //     else {

    //          $notmatchdata[] = $element;

    //     }
    // }
    // if (!empty($matchdata)){
    // $this->messageManager->addSuccessMessage(json_encode($matchdata)."Data Match!");
    // }
    // if (!empty($notmatchdata)){
    // $this->messageManager->addErrorMessage(json_encode($notmatchdata)."Data not match ");
    // }
    // $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
    // $redirect->setUrl('http://local.magento2.4.5.com/bag.html');

    // return $redirect;
    
    // }  

    





    



    
    protected $searchCriteriaBuilder;

    
    private $orderRepository;

  
    private $logger;

  
    public function __construct(
       
        \Magento\Framework\App\Action\Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        OrderRepositoryInterface $orderRepository,
        LoggerInterface $logger,
        
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->orderRepository = $orderRepository;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        $orderId = null;
        try {
            $incrementId = '000000138';
            $searchCriteria = $this->searchCriteriaBuilder
                ->addFilter('increment_id', $incrementId)->create();
            $orderData = $this->orderRepository->getList($searchCriteria)->getItems();
            // print_r(get_class_methods($orderData));
            // die;
            foreach ($orderData as $order) {
               $orderId = $order->getId();
               print_r($orderId);
            }
          
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
        }

        // echo $orderId;
    }


    	
}



// $orderId = null;
// try {
//     $incrementId = '000000138';
//     $searchCriteria = $this->searchCriteriaBuilder
//         ->addFilter('increment_id', $incrementId)->create();
//     $orderData = $this->orderRepository->getList($searchCriteria)->getItems();
//     // print_r($orderData->getData());
//     // die;
//     foreach ($orderData as $order) {
//        $orderId = $order->getId();
//     }
//     print_r($orderId);
// } catch (Exception $exception) {
//     $this->logger->error($exception->getMessage());
// }