<?php
namespace Dolphin\MyModule\Model\ResourceModel\Contact;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Dolphin\MyModule\Model\Contact as ContactModel;
use Dolphin\MyModule\Model\ResourceModel\Contact as ContactResourceModel;
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ContactModel::class, ContactResourceModel::class);
    }
}