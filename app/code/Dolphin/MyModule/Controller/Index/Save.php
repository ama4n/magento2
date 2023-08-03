<?php
namespace Dolphin\MyModule\Controller\Index;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;

class Save extends \Magento\Framework\App\Action\Action
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
          \Magento\Framework\Message\ManagerInterface $messageManager
         
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
          
          $uploadedFile = $this->uploadFile();
     
          if ($this->getRequest()->isPost()) {
               $input=[];
               $input[] = $this->getRequest()->getPostValue();
               
               $file= ['img-name'=>$this->getRequest()->getFiles('image')];
               
               // $file= $this->getRequest()->getFiles('image');
               $input[]= ($file && array_key_exists('name', $file)) ? $file['name'] : null;
               //  echo "<pre>";print_r($input);
                    // die();
               
               // if(!empty($input)){
                    $res = array_merge($input[0],$file);
                    // echo "<pre>";print_r($res);
                  
                    $rs= ['image'=>$res['img-name']['name']];
                   
                   
                    $pass = array_merge($input[0],$rs);
               
              
               
                    $postData = $this->_contactFactory->create();
              
                if (isset($input['id'])) {
                    $id = $input['id'];
                    echo $id;
                    die();
               
                   
                  
               } else {
                    $id = 0;
               }
           
                
               if($id != 0){
                    $postData->load($id);
                    $postData->addData($input);
                    $postData->setId($id);
                    $postData->save();
               }else{
                    $postData->setData($pass)->save();
               }
               $this->messageManager->addSuccessMessage("Data added successfully!");
               return $this->_redirect('mymodule/index/index');
          }
          return $this->_redirect('mymodule/index/index');
     }
     public function uploadFile()
     {
          $yourFolderName = 'your-custom-folder/';
          $yourInputFileName = 'image';
          try{
          $file = $this->getRequest()->getFiles($yourInputFileName);
          $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;
          if ($file && $fileName) {
               $target = $this->mediaDirectory->getAbsolutePath($yourFolderName); 
               $uploader = $this->fileUploader->create(['fileId' => $yourInputFileName]);
              
               $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
               $uploader->setAllowCreateFolders(true);
               $uploader->setAllowRenameFiles(true);
               $result = $uploader->save($target);
              
               if (isset($result['file'])) {
                   
                    
                    // $this->messageManager->addSuccess(__('File has been successfully uploaded.')); 
                }
                
                return $target . $uploader->getUploadedFileName();


          }
        }
        catch (\Exception $e) {
          $this->messageManager->addError($e->getMessage());
      }

      return false;
     }
}