<?php

namespace Milan\Asesor\Model;

use Milan\Asesor\Helper\UserHelper;
use Milan\Asesor\Model\ResourceModel\Asesores\CollectionFactory;

/* La clase DataProviderAsesores extiende de AbstractDataProvider de Magento.
    Se utiliza para proporcionar datos de Asesores. */
class DataProviderAsesores extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    protected $authUser;
    
    /* La función constructora se llama automáticamente al instanciar la clase. Inicializa las
       propiedades $collection y $authUser. */
    public function __construct(

        CollectionFactory $asesoresFactory,
        UserHelper $authUser,

    )
    {
        $this->collection = $asesoresFactory->create();
        $this->authUser = $authUser;
    }

     
    /* La función getData() devuelve los datos de los asesores. Si el usuario autenticado
       es un administrador, devuelve todos los elementos de la coleccion. Si no, solo devuelve
       los elementos que coinciden con el ID del rol del usuario. */
    public function getData()
    {
        $role = $this->authUser->getUserRole();
        
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        if($this->authUser->isAdmin())
        {
            $items = $this->collection->getItems();
        }
        else {

            $items = $this->collection->addFieldToFilter('role_id', $role->getId())->getItems();
        }
        return $items;

    }
    
    /* La función getUserRoleId() devuelve el ID del rol del usuario actualmente autenticado. */
    public function getUserRoleId()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getRoleId();
    }
}