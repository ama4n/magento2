<?php
declare(strict_types=1);
namespace Register\User\Setup\Patch\Data;

use Magento\Catalog\Model\Config;
use Magento\Eav\Api\AttributeManagementInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class CreateCustomAttr implements DataPatchInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var Config
     */
    private $config;
    /**
     * @var AttributeManagementInterface
     */
    private $attributeManagement;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     * @param Config $config
     * @param AttributeManagementInterface $attributeManagement
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory,
        Config $config,
        AttributeManagementInterface $attributeManagement
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
        $this->config = $config;
        $this->attributeManagement = $attributeManagement;
    }
    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
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
            'my_attribute',
            [
                'type' => 'int',
                'label' => 'My Yes no attribute',
                'input' => 'boolean',
                'source' => Boolean::class,
                'sort_order' => 250,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => '0'
            ]
        );
        $attributeSetIds = $eavSetup->getAllAttributeSetIds(\Magento\Catalog\Model\Product::ENTITY);

        
    }
}