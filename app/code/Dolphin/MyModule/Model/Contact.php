<?php
namespace Dolphin\MyModule\Model;
use Magento\Framework\Model\AbstractModel;
use Dolphin\MyModule\Model\ResourceModel\Contact as ContactResourceModel;
class Contact extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ContactResourceModel::class);
    }
}