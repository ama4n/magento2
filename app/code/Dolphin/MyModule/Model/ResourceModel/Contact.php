<?php
namespace Dolphin\MyModule\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Contact extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('crud1', 'id');
    }
}