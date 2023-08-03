<?php
namespace Dolphin\MyModule\Block;
use Magento\Backend\Block\Template\Context;
use Dolphin\MyModule\Model\ContactFactory;
use Dolphin\MyModule\Model\Contact;

class Index extends  \Magento\Framework\View\Element\Template
{
    protected $contactFactory;
    protected $customFactory;
    protected $customdataCollection;
    protected $storeManager;
       
    
   
    public function __construct(
       
        ContactFactory $contactFactory,
        Context $context,
        Contact $model,
        \Dolphin\MyModule\Model\Contact $customFactory,
        \Dolphin\MyModule\Model\ResourceModel\Contact\CollectionFactory $customdataCollection,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->contactFactory=$contactFactory;
        $this->customFactory = $customFactory;
        $this->customdataCollection = $customdataCollection;
        $this->storeManager = $storeManager;
        $this->model = $model;
        
    }
    protected function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('User Data Information'));
        parent::_prepareLayout();
        $page_size = $this->getPagerCount();
       
        $page_data = $this->getCustomData();
        // echo($page_data);
        if ($this->getCustomData()) {
            $pager = $this->getLayout()->createBlock(
                \Magento\Theme\Block\Html\Pager::class,
                'custom.pager.name'
               
            )
        
           
                ->setAvailableLimit($page_size)
                ->setShowPerPage(true)
                ->setCollection($page_data);
            $this->setChild('pager', $pager);
            $this->getCustomData()->load();
            
        }
       
        return $this;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    public function getCustomData()
    {
        // get param values
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5; // set minimum records
       
        // get custom collection
       
        $collection=$this->customFactory->getCollection();
        //  print_r($collection);
       
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }
    public function getPagerCount()
    {
        // get collection
        $minimum_show = 5; // set minimum records
       
        $page_array = [];
        $list_data = $this->customdataCollection->create();
      
        $list_count = ceil(count($list_data->getData()));
        
        $show_count = $minimum_show + 1;
       
        if (count($list_data->getData()) >= $show_count) {
            $list_count = $list_count / $minimum_show;
           
            $page_nu = $total = $minimum_show;
            //
            $page_array[$minimum_show] = $minimum_show;
            // 
            for ($x = 0; $x <= $list_count; $x++) {
                $total = $total + $page_nu;
                // echo   $total ;
                $page_array[$total] = $total;
               
            }
        } else {
            $page_array[$minimum_show] = $minimum_show;
            
            $minimum_show = $minimum_show + $minimum_show;
           
            $page_array[$minimum_show] = $minimum_show;
        }
        return $page_array;
    }
    
    
//    ========================================
     public function getMediaUrl()
     {
      $mediaUrl = $this->storeManager->getStore()
         ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'your-custom-folder/';
     return $mediaUrl;
   }
    
   
}