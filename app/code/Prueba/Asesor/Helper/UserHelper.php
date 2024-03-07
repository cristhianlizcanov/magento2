<?php

namespace Prueba\Asesor\Helper;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;




class UserHelper
{
    protected $authSession;

    public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession
    ) {
        $this->authSession = $authSession;
    }

    public function getUserRole()
    {
        if ($this->authSession && $this->authSession->isLoggedIn()) {
            return $this->authSession->getUser()->getRole();
        }

        return null;
    }

    public function isAdmin()
    {
        return $this->getUserRole()->getId() == 1;
    }
}