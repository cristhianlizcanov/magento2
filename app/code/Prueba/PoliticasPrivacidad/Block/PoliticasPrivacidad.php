<?php
namespace Prueba\PoliticasPrivacidad\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class PoliticasPrivacidad extends Template
{
    public function getTitle(){
        return __("Store Privacy Policies");
    }
}
