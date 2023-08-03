<?php
namespace Customer\Tab\Block;
class Index extends \Magento\Framework\View\Element\Template
{
     protected $_pageFactory;
     protected $_postLoader;
     protected $orderCollectionFactory;
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Sales\Model\OrderFactory $order,
          \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
          \Magento\Sales\Model\Order\Invoice $invoice,
     ){  
          $this->invoice = $invoice;
          $this->_pageFactory = $pageFactory;
          $this->order = $order;
          $this->orderCollectionFactory = $orderCollectionFactory;
          return parent::__construct($context);
     }
     public function execute()
     {
          return $this->_pageFactory->create();
     }

   

    public function getOrderCollection()
    {
     $orderCollecion = $this->orderCollectionFactory->create()->addFieldToSelect('*');
     $order=$orderCollecion->addAttributeToFilter('customer_email', 'raj123@gmail.com');
    
        
        foreach($order as $items)
        {
           
            $orderId= $items->getEntityId();
             $invoice= $this->invoice->load($orderId,'order_id');
            echo"IncrementId : ". $invoice->getIncrementId(). "<br>";
            echo"GrandTotal : ". $invoice->getGrandTotal(). "<br>";
            echo"Date : ". $invoice->getCreatedAt()."<br>". "======";

           
         }
     }
    
}
     
     
