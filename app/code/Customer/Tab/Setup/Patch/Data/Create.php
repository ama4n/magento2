<?php
declare(strict_types=1);
namespace Customer\Tab\Setup\Patch\Data;

use Magento\Catalog\Model\Config;
use Magento\Eav\Api\AttributeManagementInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class Create implements DataPatchInterface
{
    
    
    private $eavSetupFactory;
   
    private $moduleDataSetup;
    
    private $config;
   
    private $attributeManagement;

    
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        Config $config,
        AttributeManagementInterface $attributeManagement,
       
    ) {
        
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->config = $config;
        $this->attributeManagement = $attributeManagement;
    }
    
    public static function getDependencies()
    {
        return [];
    }

   
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
       
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'price_kg',
            [
                'group' => 'Delivery Date',
                'sort_order' => 30,
                'type' => 'decimal',
                'backend' => '',
                'frontend' => '',
                'label' => 'Price',
                'input' => 'price',
                'class' => '',
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => true,
                'filterable' => false,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
            ]
        );
        $attributeSetIds = $eavSetup->getAllAttributeSetIds(\Magento\Catalog\Model\Product::ENTITY);

        
    }
}