<?php

namespace Web\HelloWorld\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Store\Model\ScopeInterface;
 

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    protected $logger;
    protected $helperData;
    protected $quoteRepository;


    public function __construct(
       \Psr\Log\LoggerInterface $logger,
       \Web\HelloWorld\Helper\Data $helperData,
       \Magento\Quote\Model\QuoteRepository $quoteRepository
                   ) {
       $this->logger = $logger;
       $this->helperData = $helperData;
       $this->quoteRepository = $quoteRepository;
   }
   
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
        $item = $observer->getEvent()->getData('quote_item');
        
        $product = $observer->getEvent()->getData('product');

        $item = ($item->getParentItem() ? $item->getParentItem() : $item);
        
       $db_value= $this->helperData->getGeneralConfig('display_text');
        
        
        // $item->setCustomPrice($db_value);
        // $item->setOriginalCustomPrice($db_value);
        $item->setPriceTextField($db_value);
        $item->getProduct()->setIsSuperMode(true);
        
    }
}
		
	

