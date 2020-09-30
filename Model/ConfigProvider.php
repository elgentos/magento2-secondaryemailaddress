<?php
namespace Elgentos\SecondaryEmailAddress\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class ConfigProvider
 *
 * @package Elgentos\SecondaryEmailAddress\Model
 */
class ConfigProvider
{
    const XML_PATH_ADVANCEDLOGIN_LOGIN_MODE = 'customer/secondaryemailaddress/login_mode';
    const XML_PATH_ADVANCEDLOGIN_LOGIN_ATTRIBUTE = 'customer/secondaryemailaddress/login_attribute';
    const XML_PATH_ADVANCEDLOGIN_LOGIN_ATTRIBUTE_LABEL = 'customer/secondaryemailaddress/login_attribute_label';
    const XML_PATH_CUSTOMER_ACCOUNT_SHARE_SCOPE = 'customer/account_share/scope';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * ConfigProvider constructor.
     *
     * @param ScopeConfigInterface  $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(ScopeConfigInterface $scopeConfig, StoreManagerInterface $storeManager)
    {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * Retrieve the configured login mode
     *
     * @return int
     */
    public function getLoginMode()
    {
        return (int)$this->scopeConfig->getValue(self::XML_PATH_ADVANCEDLOGIN_LOGIN_MODE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Retrieve the custoemr account share scope
     *
     * @return int
     */
    public function getCustomerAccountShareScope()
    {
        return (int)$this->scopeConfig->getValue(self::XML_PATH_CUSTOMER_ACCOUNT_SHARE_SCOPE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Retrieve the customer attribute for login
     *
     * @return string
     */
    public function getLoginAttribute()
    {
        $attribute = (string)$this->scopeConfig->getValue(self::XML_PATH_ADVANCEDLOGIN_LOGIN_ATTRIBUTE, ScopeInterface::SCOPE_STORE);
        $attribute = trim($attribute);
        if ($attribute == '') {
            return false;
        }

        return $attribute;
    }

    /**
     * Retrieve the customer attribute label
     *
     * @return string
     */
    public function getLoginAttributeLabel()
    {
        return (string)$this->scopeConfig->getValue(self::XML_PATH_ADVANCEDLOGIN_LOGIN_ATTRIBUTE_LABEL, ScopeInterface::SCOPE_STORE);
    }
}
