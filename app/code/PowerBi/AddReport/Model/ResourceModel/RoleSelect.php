<?php
namespace PowerBi\AddReport\Model\ResourceModel;

use Magento\Framework\Data\OptionSourceInterface;

class RoleSelect implements OptionSourceInterface
{
    protected $roleCollectionFactory;

    public function __construct(

        \Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory $roleCollectionFactory,
    ) {
        $this->roleCollectionFactory = $roleCollectionFactory;
    }



    /**
     * La función recupera datos de rol con los campos role_id y role_name filtrados por role_type 'G' y
     * los devuelve como una matriz.
     *
     * @return CollectionFactory $roles Una serie de opciones de roles con 'role_id' como valor y 'role_name'
     * como etiqueta para
     * roles con 'role_type' igual a 'G'.
     */
    public function toOptionArray()
    {

        $roles = $this->roleCollectionFactory->create()
        ->addFieldToSelect('role_id', 'value')
            ->addFieldToSelect('role_name', 'label')
            ->addFieldToFilter('role_type', 'G')
            ->load();

        return $roles->getData();
        
    }
    

}


// if(user-id === roleid){

    // }