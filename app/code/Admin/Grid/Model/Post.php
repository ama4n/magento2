<?php
namespace Admin\Grid\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Admin\Grid\Model\ResourceModel\Post');
	}
}