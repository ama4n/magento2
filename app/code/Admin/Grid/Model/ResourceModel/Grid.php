<?php
/**
 * Grid Grid ResourceModel.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Admin\Grid\Model\ResourceModel;

/**
 * Grid Grid mysql resource.
 */
class Grid extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
  
    protected $_idFieldName = 'id';
    
    protected $_date;

   
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resourcePrefix = null
    ) 
    {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('admin_grid', 'id');
    }
}