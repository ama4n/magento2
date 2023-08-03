<?php

namespace Admin\Grid\Controller\Adminhtml\Grid;

class Index extends \Magento\Backend\App\Action
{
  
    protected $_resultPageFactory;

    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) 
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    
    public function execute()
    {
       
      
        $resultPage = $this->_resultPageFactory->create();
        
        $resultPage->setActiveMenu('Admin_Grid::grid_list');
       
        $resultPage->getConfig()->getTitle()->prepend(__('Grid List'));
        
        return $resultPage;
    }

    /**
     * Check Grid List Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Admin_Grid::grid_list');
        
    }
}