<?php

namespace Elgentos\SecondaryEmailAddress\Plugin\Model\Order\Email\Container;

use Elgentos\SecondaryEmailAddress\Model\ConfigProvider;
use Magento\Customer\Model\CustomerFactory;
use Magento\Sales\Model\Order\Email\Container\Container;

/**
 * Class ContainerPlugin
 * @package Elgentos\SecondaryEmailAddress\Plugin\Model\Order\Email\Container
 */
class ContainerPlugin
{
    /**
     * @var ConfigProvider
     */
    public $configProvider;
    /**
     * @var CustomerFactory
     */
    public $customerFactory;

    /**
     * ContainerPlugin constructor.
     * @param ConfigProvider $configProvider
     * @param CustomerFactory $customerFactory
     */
    public function __construct(
        ConfigProvider $configProvider,
        CustomerFactory $customerFactory
    )
    {
        $this->configProvider = $configProvider;
        $this->customerFactory = $customerFactory;
    }

    /**
     * @param Container $subject
     * @param $result
     */
    public function afterGetCustomerEmail(Container $subject, $customerEmail)
    {
        try {
            $customer = $this->customerFactory->create()->setWebsiteId(1)->loadByEmail($customerEmail);
            $loginAttribute = $this->configProvider->getLoginAttribute();
            $loginAttributeValue = $customer->getData($loginAttribute);
            if (!\filter_var($loginAttributeValue, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Login attribute value is not an email address');
            }
        } catch (\Exception $e) {
            return $customerEmail;
        }

        return $loginAttributeValue;
    }
}
