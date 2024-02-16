<?php

namespace Prueba\TypeProduct\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Cm\RedisSession\Handler\LoggerInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */

    protected $resultPageFactory;

    /**
     * @var JsonFactory
     */

    protected $resultJsonFactory;

    /**
     * @var LoggerInterface
     */

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        echo "action";
        exit;

        $this->logger->debug('mensaje 1');
        $this->logger->info('mensaje 2');
        $this->logger->notice('mensaje 3');

        $result = $this->resultJsonFactory->create();
        $data = ['message' => 'Prueba Log'];

        return $result->setData($data);


    }


}
