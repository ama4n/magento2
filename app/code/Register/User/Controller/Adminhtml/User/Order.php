<?php
namespace Register\User\Controller\Adminhtml\User;
use Magento\Framework\Controller\ResultFactory;


class Order extends  \Magento\Backend\App\Action

{
  protected $_request;
  protected $resultFactory;


  public function __construct(
		
        \Magento\Framework\App\Request\Http $request,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
		
	)
  {
    $this->_request = $request;
    $this->resultFactory = $resultFactory;

    parent::__construct($context);
  }
	
      public function execute()
    {
      //  die("hfgfghh");
      $status=$this->getRequest()->getParams();
      $dataid= $status['form'];
       $value =$status['history']; 
      //  echo $dataid;
      echo  $value;
      

      
       $order=1; 
      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    
        
      $order = $objectManager->create('\Magento\Sales\Model\Order')->load($dataid);
                                 
      $order->setState($value)->setStatus($value);
  
      $order->save();
      $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
      $redirect->setUrl("/admin/sales/order/index/");
    }
    
   
}