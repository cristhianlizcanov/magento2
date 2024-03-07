<?php

namespace PowerBi\AddReport\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory;

class RoleName extends Column
{
    protected $roleCollectionFactory;

    public function __construct(
        ContextInterface $context,
        CollectionFactory $roleCollectionFactory,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
        ) {
            parent::__construct($context, $uiComponentFactory, $components, $data);
            
        $this->roleCollectionFactory = $roleCollectionFactory;
    }
    
    public function toOptionArray($roleId)
    {
        $roles = $this->roleCollectionFactory->create()
        ->addFieldToSelect('role_id', 'id')
            ->addFieldToSelect('role_name', 'name')
            ->addFieldToFilter('role_id', $roleId)
            ->load();
            

        return $roles->getData()[0];
        
    }

    public function prepareDataSource(array $dataSource)
    {
        
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['role_id'])) {
                    $item[$this->getData('name')] = $this->toOptionArray($item['role_id'])["name"];
                }
            }
        }

        return $dataSource;
    }
}
