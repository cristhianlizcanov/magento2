<?php

namespace PowerBi\AddReport\Model;

use Magento\Authorization\Model\UserContextInterface;

class Role
{
    /**
     * @var UserContextInterface
     */
    protected $userContext;

    public function __construct(
        UserContextInterface $userContext,
    ) {
        $this->userContext = $userContext;
    }

    public function getUserRoleId()
    {
        $roleId = $this->userContext->getUserId();
        var_dump($this->userContext->getUserId());
        exit;
        return $roleId;
    }
}










// namespace PowerBi\AddReport\Model;

// use Magento\Framework\Model\AbstractModel;

// class Role extends AbstractModel
// {
//     protected function _construct()
//     {
//         $this->_init('Magento\Authorization\Model\Role');
//     }

//     public function getRoles()
//     {
//         $roles = [];
//         $collection = $this->getCollection();
//         foreach ($collection as $role) {
//             $roles[$role->getId()] = $role->getRoleName();
//         }
//         return $roles;
//     }
// }








