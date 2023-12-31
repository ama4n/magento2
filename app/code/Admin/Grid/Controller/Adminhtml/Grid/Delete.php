<?php

namespace Admin\Grid\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Admin\Grid\Model\ResourceModel\Grid\CollectionFactory;

class Delete extends \Magento\Backend\App\Action
{
   
    protected $_filter;
    protected $_collectionFactory;

   
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {

        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection->getItems() as $record) {
          $id=  $record->setId($record->getId());
        //   print_r( $id); die;
            $record->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }

    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Admin_Grid::row_data_delete');
    }
}