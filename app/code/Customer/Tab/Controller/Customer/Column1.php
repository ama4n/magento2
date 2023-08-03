<?php
namespace Customer\Tab\Controller\Customer;
use Magento\Framework\Controller\ResultFactory;
class Column1 extends \Magento\Framework\App\Action\Action
{
   
    protected $_pageFactory;
	protected $resultPageFactory;


	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory)
	{
		$this->_pageFactory = $pageFactory;
		$this->resultPageFactory = $resultPageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
       
        
        // die("asdffjlk");
		$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultPage = $this->resultPageFactory->create();
       
		return $this->_pageFactory->create();
        return $resultPage;
		
	}
    
}