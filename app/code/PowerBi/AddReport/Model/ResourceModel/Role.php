<?php

namespace PowerBi\AddReport\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Role extends AbstractDb
{
    /**
     * Initialize resource model
     * @return void
     */

     protected function _construct()
     {
        $this->_init('authorization_role', 'role_id');
     }
}