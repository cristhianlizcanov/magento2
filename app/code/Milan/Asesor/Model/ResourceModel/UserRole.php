<?php

namespace Milan\Asesor\Model\ResourceModel;


use Magento\Backend\Model\Auth\Session;
use Magento\Ui\Component\Listing\Columns\Column;


/* La clase UserRole extiende de Column de Magento. Se utiliza para manejar roles del usuario. */
class UserRole extends Column
{

     /**
     * Constructor de la clase UserRole.
     * Inicializa las propiedades $userFactory y $userSession.
     *
     * @param \Magento\User\Model\UserFactory $userFactory
     * @param Session $userSession
     */

    protected $userFactory;

    protected $userSession;

    /* La función constructora se llama automáticamente al instanciar la clase. Inicializa las propiedades
       $userFactory y $userSession. */
    public function __construct(

        \Magento\User\Model\UserFactory $userFactory,
        Session $userSession

    ) {

        $this->userFactory = $userFactory;
        $this->userSession = $userSession;

    }
    
    /* La función getRoleData() devuelve los datos del rol del usuario especificado por $userId. */
    public function getRoleData($userId)
{
    $user = $this->userFactory->create()->load($userId);
    $role = $user->getRole();
    return $role->getData();
    
}

/* La función getUserId() devuelve el ID del usuario actualmente autenticado. */
public function getUserId()
{
    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

    return $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getID();

  }

}