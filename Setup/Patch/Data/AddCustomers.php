<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CustomerSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\CustomerSampleDataVenia\Setup\CustomerInstall;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class AddCustomers implements
    DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /** @var  CustomerInstall $customerSetup */
    protected $customerSetup;

    /**
     * AddCustomers constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CustomerInstall $customerSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup, CustomerInstall $customerSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->customerSetup = $customerSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $this->customerSetup->install(['Magento_CustomerSampleDataVenia::fixtures/customer_profile.csv']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
