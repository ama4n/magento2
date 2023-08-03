<?php
namespace Web\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$item= new \Magento\Framework\DataObject(array('mp_text' =>$item));
$this->_eventManager->dispatch('checkout_cart_product_add_after', ['mp_text' =>$item]); 
		print_r($item->getData());
		exit;
	}
}