<?php
namespace Register\User\Block\Adminhtml\Orderedit\Tab;
use \Magento\Sales\Model\OrderFactory;

 
class View extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_template = 'tab/view/my_order_info.phtml';
    protected $orderFactory;
    public $status;
    

 
    public function __construct(
        
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        $this->orderFactory = $orderFactory;
        

        parent::__construct($context, $data);
    }
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }
    public function getOrderId()
    {
        return $this->getOrder()->getEntityId();
    }
    public function getOrderIncrementId()
    {
        return $this->getOrder()->getIncrementId();
    }
    public function getTabLabel()
    {
        return __('My Custom Tab');
    }
    public function getTabTitle()
    {
        return __('My Custom Tab');
    }
    public function canShowTab()
    {
        return true;
    }
    public function isHidden()
    {
        return false;
    }

    public function getOrderStatusLabel(){
         
        $manager = \Magento\Framework\App\ObjectManager::getInstance(); 
        return $manager->create('Magento\Sales\Model\ResourceModel\Order\Status\Collection'); 
       
    }
   
}