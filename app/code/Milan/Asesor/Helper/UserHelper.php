<?php

namespace Milan\Asesor\Helper;

/* La clase UseHelper se utiliza para manejar las acciones relacionadas con el usuario
   Magento. */
class UserHelper
{
    /**
   
     * @param $authSession
     */
    protected $authSession;
    
    /* La función constructora se utiliza para inicializar el objeto. Recibe un parametro:
       $authSession que proporciona información sobre la sesión de autenticación del usuario. */
    public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession
    ) {
        $this->authSession = $authSession;
    }
     
    /* La función getUserRole() se utiliza para obtener el rol del usuario actual. Si el usuario
       está autenticado, devuelve el rol del usuario. Si no, devuelve null. */
    public function getUserRole()
    {
        if ($this->authSession && $this->authSession->isLoggedIn()) {
            return $this->authSession->getUser()->getRole();
        }

        return null;
    }

    /* La función isAdmin() se utiliza para comprobar si el usuario actual es un administrador.
       Devuelve true si el Id del rol del usuario es 1, lo que indica que el usuario es administrador.*/
    public function isAdmin()
    {
        return $this->getUserRole()->getId() == 1;
    }
}