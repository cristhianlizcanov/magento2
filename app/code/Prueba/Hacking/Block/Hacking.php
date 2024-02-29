<?php

namespace Prueba\Hacking\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Data\Form\FormKey;
class Hacking extends Template
{
    protected $formKey;
    public function getFormAction()
    {
        return $this->getUrl('hacking/index/submit', ['_secure' => true]);
    }
    public function getFormAction2(){
        return $this->getUrl('hacking/index/index', ['_secure' => true]);
    }
    public function getFormKey(){
        return $this->formKey->getFormKey();
    }
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        FormKey $formKey,
        array $data = []
    ) {
        $this->formKey = $formKey;
        parent::__construct($context, $data);
    }
}
