<?php

namespace Milan\AddReport\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory;

/* La clase RoleName extiende de la clase \Magento\Ui\Component\Listing\Columns\Column
   y se utiliza para definir las acciones de los elementos en una lista de la interfaz
   de usuario de Magento. */
class RoleName extends Column
{
    protected $roleCollectionFactory;

    /* La función constructora inicializa la instancia de la clase con los objectos necesarios
       y llama al contructor de la clase padre. */
    
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
    
    /* La función toOptionArray toma un Id del rol y devuelve los datos del rol correspondiente. */
    public function toOptionArray($roleId)
    {
        $roles = $this->roleCollectionFactory->create()
        ->addFieldToSelect('role_id', 'id')
            ->addFieldToSelect('role_name', 'name')
            ->addFieldToFilter('role_id', $roleId)
            ->load();
            

        return $roles->getData()[0];
        
    }
   
    /* La función prepareDataSource prepara los datos para la lista de la interfaz de usuario.
       Añade el nombre del rol a cada elemento de la lista. */
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
