<?php

namespace Admin\Grid\Controller\Adminhtml\Post;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Admin\Grid\Model\ResourceModel\Post\Grid\CollectionFactory;


class Massdelete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $postFactory;
    protected $_filter;
    protected $_collectionFactory;

	public function __construct(
        
        Filter $filter,
        CollectionFactory $collectionFactory,
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Admin\Grid\Model\PostFactory $postFactory
	)
	{
		$this->postFactory = $postFactory;
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
        //  die("hhhh");
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        // print_r($collection); die;
        $recordDeleted = 0;
        foreach ($collection->getItems() as $record) {
            $id= $record->setId($record->getId());
            echo $id; die;
            $record->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));

        // return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('grid/post/index');





       
    //     $resultRedirect = $this->resultRedirectFactory->create();
    //     // print_r($resultRedirect); die;
    //     //  $p= get_class_methods($resultRedirect);
    //     //  print_r($p); die;
    //     $id=$this->getRequest()->getParam('id');
    // //    echo $id; exit;
   
           
        
    
	//      try{
	//            	   $model = $this->postFactory->create()->load($id);
	// 			   $model->delete();
	// 	    	$this->messageManager->addSuccessMessage(__('You have deleted the post.'));
	// 		}catch(\Exception $e){
	// 			 $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the post.'));
	// 		}
	//     return $resultRedirect->setPath('grid/post/index');
	}


}