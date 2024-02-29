<?php

namespace Prueba\Hacking\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Submit extends \Magento\Framework\App\Action\Action
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
        PageFactory $rePageFactory
    ) {
        $this->rePageFactory = $rePageFactory;
        parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection =$resource->getConnection();
        $email = $this->getRequest()->getParam('email');
        $bind= ['email'=>$email];
        $select = $connection->select()->from('quote',['*'])->where('customer_email= :email');
        $result= $connection->fetchAll($select,$bind);

        $sql = "select * from quote where customer_email = '" . $email . "'";
        $result = $connection->fetchAll($sql);
        

        /* echo "[".$select."]";
        echo "<pre>";
        var_dump($_REQUEST);
        echo "</pre>";

        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        exit; */

        return $this->rePageFactory->create();
    }
}
