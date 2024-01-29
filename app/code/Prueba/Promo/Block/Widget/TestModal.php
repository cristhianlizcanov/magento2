<?php

namespace Prueba\Promo\Block\Widget;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Widget\Block\BlockInterface;
use Prueba\Promo\Helper\Configuration as HelperConfiguration;

/** 
 *  Class Promo widget
 */
class TestModal extends Template implements BlockInterface
{
    const WIDGET_OPTION_BLOCK = 'block_id';

    protected $_template = "widget/testmodal.phtml";

    private $helperConfiguration;

    private $storeManager;

    public function __construct(
        HelperConfiguration $helperConfiguration,
        StoreManagerInterface $storeManager,
        Template\Context $context,
        array $data = []

    ) {
        $this->helperConfiguration = $helperConfiguration;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function isExtensionEnabled(): bool
    {
        return $this->helperConfiguration->isEnabled();
    }

    public function getDefaultCustomCSSClass(): string
    {
        return $this->helperConfiguration->getCustomCssClass();
    }

    public function getDefaultModalInitTime(): string
    {
        return $this->helperConfiguration->getModalInitTime();
    }

    public function getModalBlockContent(): string
    {
        $blockId = $this->getWidgetModalBlockContentId();
        if ($blockId != '') {
            try {
                return $this->getLayout()
                    ->createBlock('Magento\Cms\Block\Block')
                    ->setBlockId($blockId)
                    ->toHtml();
            } catch (LocalizedException $e) {
                $this->__logger->error(__('Modal Block not found.'));
            }
        }

        return '';
    }

    protected function getWidgetModalBlockContentId(): string
    {
        return $this->getData(self::WIDGET_OPTION_BLOCK);
    }

}
