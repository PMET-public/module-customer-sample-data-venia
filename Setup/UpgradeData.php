<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CustomerSampleDataVenia\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;


class UpgradeData implements UpgradeDataInterface
{


    /** @var \Magento\CustomerSampleDataVenia\Model\Customer  */
    protected $customerSetup;


    public function __construct(
        \Magento\CustomerSampleDataVenia\Model\Customer $customerSetup
    )
    {
        $this->customerSetup = $customerSetup;
    }

    public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.2', '<=')) {
            $this->customerSetup->addAddresses(['Magento_CustomerSampleDataVenia::fixtures/additional_addresses.csv']);
        }
    }
}
