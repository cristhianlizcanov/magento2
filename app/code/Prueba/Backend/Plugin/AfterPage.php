<?php

namespace Prueba\Backend\Plugin;

use Magento\Cms\Model\Page;

class AfterPage
{
    public function afterGetTitle(Page $subject, $result)
    {
        return 'SAMPLE: ' . $result;
    }
    // public function afterGetPrice($product, $proceed): float
    // {
    //     $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

    //     $session = $objectManager->create(\Magento\Customer\Model\Session::class);

    //     if ($session->isLoggedIn()) {
    //         return $proceed;
    //     } else {
    //         return '';
    //     }
  
    // }

}

// Magento\Catalog\Model\Product
