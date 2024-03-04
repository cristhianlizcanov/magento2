<?php
namespace PowerBi\AddReport\Model;

use Magento\Framework\Model\AbstractModel;

class Role extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('PowerBi\AddReport\Model\ResourceModel\Role');
    }

    public function getRoles()
    {
        $roles = [];
        $collection = $this->getCollection();
        foreach ($collection as $role) {
            $roles[$role->getRole()->getId()] = $role->getRoleName();
        }
        return $roles;
    }
}
