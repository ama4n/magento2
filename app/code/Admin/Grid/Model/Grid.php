<?php


namespace Admin\Grid\Model;

use Admin\Grid\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'admin_grid';

    /**
     * @var string
     */
    protected $_cacheTag = 'admin_grid';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'admin_grid';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Admin\Grid\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

   
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

   
    public function setAddress($Address)
    {
        return $this->setData(self::ADDRESS, $Address);
    }

}