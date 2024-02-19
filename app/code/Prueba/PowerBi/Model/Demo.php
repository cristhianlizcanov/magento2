<?php

namespace Prueba\PowerBi\Model;

use Magento\Framework\Model\AbstractModel;

class Demo extends AbstractModel
{
    /**
     * Initialize resource model
     * @return void
     */

     protected function _construct()
     {
      $this->_init('Prueba\PowerBi\Model\ResourceModel\Demo');
     }
}