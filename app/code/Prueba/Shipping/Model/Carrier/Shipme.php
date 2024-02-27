<?php

namespace Prueba\Shipping\etc\Model\Carrier;

use Psr\Log\LoggerInterface;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Quote\Model\Quote\Address\RateResult\Error;
use Magento\Quote\Model\Quote\Address\RateResult\Method;

class Shipme extends AbstractCarrier implements CarrierInterface
{
    protected $code = 'shipme';

    /**
     * @var \Magento\Shipping\Model\Rate\Result
     */
    protected $rateResultFactory;

    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\Method
     */
    protected $rateMethodFactory;


    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Error $rateErrorFactory,
        LoggerInterface $logger,
        ResultFactory $rateResultFactory,
        Method $rateMethodFactory,
        array $data = []
    ) {
        $this->rateResultFactory = $rateResultFactory;
        $this->rateMethodFactory = $rateMethodFactory;
        parent::__construct(
            $scopeConfig,
            $rateErrorFactory,
            $logger,
            $data
        );
    }

    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
        $result = $this->rateResultFactory->create();

        //check if express is enabled
        if ($this->getConfigData('express_enabled')) {
            $method = $this->rateMethodFactory->create();
            $method->setCarrier($this->code);
            $method->setCarrierTitle($this->getConfigData('name'));
            $method->setMethod('express');
            $method->setMethodTitle($this->getConfigData('express_title'));
            $method->setPrice($this->getConfigData('express_price'));
            $method->setCost($this->getConfigData('express_price'));
            $result->append($method);
        }

        //check if business is enabled
        if ($this->getConfigData('business_enabled')) {
            $method = $this->rateMethodFactory->create();
            $method->setCarrier($this->code);
            $method->setCarrierTitle($this->getConfigData('name'));
            $method->setMethod('business');
            $method->setMethodTitle($this->getConfigData('business_title'));
            $method->setPrice($this->getConfigData('business_price'));
            $method->setCost($this->getConfigData('business_price'));
            $result->append($method);
        }

        return $result;
    }

    public function getAllowedMethods()
    {
        return ['shipme' => $this->getConfigData('name')];
    }
}
