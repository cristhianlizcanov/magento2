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
        


    public function toOptionArray()
    {

        $role = $this->roleCollectionFactory->create()
        ->addFieldToSelect('role_id', 'value')
        ->addFieldToSelect('role_name', 'label')
        ->addFieldToFilter('role_type', 'G' )
        ->load()->toArray();

        return $role;
        
    }
}
