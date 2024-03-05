<?php
namespace PowerBi\AddReport\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Role extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('authorization_role', 'role_id');
    }
}
