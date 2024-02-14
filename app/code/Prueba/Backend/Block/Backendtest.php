<?php
namespace Prueba\Backend\Block;

use Magento\Framework\View\Element\Template;

class Backendtest extends Template
{
    public function getLandingsnUrl()
    {
        return $this->getUrl('backendtest');

    }

    public function getRedirectUrl()
    {
        return $this->getUrl('backendtest/index/redirect');
    }
}