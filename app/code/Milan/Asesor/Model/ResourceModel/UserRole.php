<?php

namespace Milan\Asesor\Model\ResourceModel;


use Magento\User\Model\User as UserModel;
use Magento\Backend\Model\Auth\Session;
use Magento\Ui\Component\Listing\Columns\Column;


class UserRole extends Column
{

    protected $userFactory;

    protected $userSession;
    public function __construct(

        \Magento\User\Model\UserFactory $userFactory,
        Session $userSession

    ) {

        $this->userFactory = $userFactory;
        $this->userSession = $userSession;

    }

    public function getRoleData($userId)
{
    $user = $this->userFactory->create()->load($userId);
    $role = $user->getRole();
    return $role->getData();
    
}

public function getUserId()
{
    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

    $userId = $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getID();

    

}

}