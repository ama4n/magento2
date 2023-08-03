<?php
namespace Dolphin\MyModule\Controller\Index;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Update extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_contactFactory;
     protected $_fileUploaderFactory;
     protected $messageManager;
     protected $filesystem;
     protected $fileUploader;
   

     
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Dolphin\MyModule\Model\ContactFactory $contactFactory,
          \Magento\MediaStorage\Model\File\UploaderFactory $fileUploader,
          \Magento\Framework\Filesystem $filesystem,
          \Magento\Framework\Message\ManagerInterface $messageManager,
         
         
     ){
          $this->_pageFactory = $pageFactory;
          $this->_contactFactory = $contactFactory;
          $this->messageManager  = $messageManager;
          $this->filesystem      = $filesystem;
          $this->fileUploader    = $fileUploader;
          $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    
         
          return parent::__construct($context);
     }
     public function execute()
     {    
          
     
          if ($this->getRequest()->isPost()) {
               
               $input = $this->getRequest()->getPostValue();
    
                $postData = $this->_contactFactory->create();
                if (isset($input['id'])) {
                    $id = $input['id'];  
               
                    $postData->load($id);
                    $postData->addData($input);
                    $postData->setId($id);
                    $postData->save();
               }
               $this->messageManager->addSuccessMessage("Data added successfully!");
               return $this->_redirect('mymodule/index/index');
          }
          return $this->_redirect('mymodule/index/index');
     }
   
   
}