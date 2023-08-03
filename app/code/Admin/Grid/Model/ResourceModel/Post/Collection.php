<?php


namespace Admin\Grid\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
    // protected $_objectManager = null;
    // protected $_instanceName = null;

	public function _construct( )
	{
       
		$this->_init('Admin\Grid\Model\Post', 'Admin\Grid\Model\ResourceModel\Post');
	}
   
}