<?php

namespace Admin\Grid\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ResultFactory;

class AddRow extends \Magento\Backend\App\Action
{
    
    private $coreRegistry;

    
    private $gridFactory;

   
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Admin\Grid\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    
    public function execute()
    {
        
        $rowId = (int) $this->getRequest()->getParam('id');
        // echo "<pre>";print_r($rowId);
        // die;
        $rowData = $this->gridFactory->create();
       
        if ($rowId) {
           $rowData = $rowData->load($rowId);
           $rowTitle = $rowData->getTitle();
           if (!$rowData->getId()) {
               $this->messageManager->addError(__('row data no longer exist.'));
               $this->_redirect('grid/grid/rowdata');
               return;
           }
       }

       $this->coreRegistry->register('row_data', $rowData);
       $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
       $resultPage->getConfig()->getTitle()->prepend($title);
       return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Admin_Grid::add_row');
    }
}