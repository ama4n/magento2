<?php
namespace Register\User\Controller\Product;


class Script extends \Magento\Framework\App\Action\Action
{
	

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
    )
	{
		return parent::__construct($context);
	}

	public function execute()
	{
       
        
        // die("asdffjlk");
        $status=$this->getRequest()->getParams();
        $dataid= $status['form'];
       $value =$status['history']; 
       echo $dataid;
       echo $value;

       $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    
        
      $order = $objectManager->create('\Magento\Sales\Model\Order')->load($dataid);
                                 
      $order->setState($value)->setStatus($value);
  
      $order->save();
		
	}
}