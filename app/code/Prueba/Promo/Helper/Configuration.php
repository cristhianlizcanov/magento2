<?php
namespace Prueba\Promo\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Configuration
 */

class Configuration extends AbstractHelper
{
    const XML_PATH_SECTION = 'testmodalwidget/';
    const XML_PATH_GROUP_STATUS = 'testmodalwidget_status_group/';
    const XML_PATH_FIELD_STATUS = 'testmodalwidget_status_field';
    const XML_PATH_GROUP_DESIGN = 'testmodalwidget_status_design/';
    const XML_PATH_FIELD_DESIGN = 'testmodalwidget_design_customcssclass';
    const XML_PATH_GROUP_TIMER = 'testmodalwidget_timer/';
    const XML_PATH_FIELD_TIMER = 'testmodalwidget_timer_default';

    private $storeManager;

    public function __construct(
        StoreManagerInterface $storeManager,
        Context $context
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;

    }

    public function getConfigValue(string $fieldPath, int $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $fieldPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function isEnabled(): bool
    {
        $isEnabled = false;
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_STATUS . self::XML_PATH_FIELD_STATUS;

        try {
            $storeId = $this->storeManager->getStore()->getId();
            $value = $this->getConfigValue($fieldPath, (int)$storeId);

            if ($value !== null) {
                $isEnabled = (bool)$value;
            }

        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }

        return $isEnabled;

    }

    public function getCustomCssClass(): string
    {
        $customCssClass = ' ';
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_DESIGN . self::XML_PATH_FIELD_DESIGN;

        try {
            $storeId = $this->storeManager->getStore()->getId();
            $value = $this->getConfigValue($fieldPath, (int)$storeId);
            if ($value !== null) {
                $customCssClass = $value;
            }

        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }
        return $customCssClass;
    }

    public function getModalInitTime()
    {
        $time = '';
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_TIMER . self::XML_PATH_FIELD_TIMER;
        try {
            $value = $this->getConfigValue($fieldPath, (int)$this->storeManager->getStore()->getId());
            if ($value !== null) {
                $time = $value;
            }
        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }

        return $time;

    }
}
