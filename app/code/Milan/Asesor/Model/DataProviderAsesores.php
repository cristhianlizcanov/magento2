<?php

namespace Milan\Asesor\Model;

use Milan\Asesor\Helper\UserHelper;
use Milan\Asesor\Model\ResourceModel\Asesores\CollectionFactory;

class DataProviderAsesores extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    protected $authUser;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $asesoresFactory,
        UserHelper $authUser,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $asesoresFactory->create();
        $this->authUser = $authUser;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

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
        foreach($items as $_asesores){
            $this->loadedData[$_asesores->getId()] = $_asesores->getData();
        }
    }

    public function getUserRoleId()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getRoleId();
    }
}