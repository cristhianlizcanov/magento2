<?php

namespace Prueba\Hacking\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $rePageFactory;
    public function __construct(
        Context $context,
        PageFactory $rePageFactory
    ) {
        $this->rePageFactory = $rePageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        return $this->rePageFactory->create();
    }
}
