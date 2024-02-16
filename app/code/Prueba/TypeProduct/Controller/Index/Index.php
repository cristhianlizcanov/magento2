<?php

namespace Prueba\TypeProduct\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;

class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $rePageFactory;
    /**
     * @var JsonFactory
     */
    protected $reJsonFactory;

    /**
     * @var LoggerInterface
     */
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        Context $context,
        PageFactory $rePageFactory,
        JsonFactory $reJsonFactory,
        LoggerInterface $logger
    ) {
        $this->rePageFactory = $rePageFactory;
        $this->reJsonFactory = $reJsonFactory;
        $this->logger = $logger;
        parent::__construct($context);
    }
    /**
     * View page action
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $this->logger->debug('mensaje 1');
        $this->logger->info('mensaje 2');
        $this->logger->notice('mensaje 3');
        $result = $this->reJsonFactory->create();
        $data = ['message' => 'Prueba Log'];
        return $result->setData($data);
    }
}
