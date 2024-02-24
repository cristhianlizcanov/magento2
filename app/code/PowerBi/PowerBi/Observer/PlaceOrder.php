<?php 

namespace PowerBi\PowerBi\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use PowerBi\PowerBi\Model\DemoFactory;

class PlaceOrder implements ObserverInterface
{
    protected $demoFactory;

    public function __construct(DemoFactory $demoFactory)
    {
        $this->demoFactory = $demoFactory;
    }

    public function execute(EventObserver $observer)
    {
        $order = $observer->getEvent()->getOrder();

        $demoList = $this->demoFactory->create();

        $demoList->setTitle(__('Neworder (%1) placed!', $order->getIncrementId()));
        $demoList->setIsVisible(1);

        try{
            $demoList->save();
        }catch(\Excpetion $e){
            //    
        }
    }
}