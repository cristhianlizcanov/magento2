<?php

namespace Prueba\PoliticasPrivacidad\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $rePageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->rePageFactory = $pageFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->rePageFactory->create();
    }
}
