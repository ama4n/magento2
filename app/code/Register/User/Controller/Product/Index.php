<?php
namespace Register\User\Controller\Product;
use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
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
       
        // echo "<pre>";print_r(get_class_methods($this));die;
        // die("asdffjlk");
		$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultPage = $this->resultPageFactory->create();
        // $resultPage->getConfig()->getTitle()->set(__('User Data Information'));
		return $this->_pageFactory->create();
        return $resultPage;
		
	}
}