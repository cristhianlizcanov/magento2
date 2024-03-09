<?php
namespace Milan\AddReport\Model\ResourceModel;

use Magento\Framework\Data\OptionSourceInterface;

/* La `clase RoleSelect implementa OptionSourceInterface` está definiendo una clase PHP llamada
`RoleSelect` que implementa `OptionSourceInterface`. Esta interfaz requiere la implementación del
método `toOptionArray`, que se utiliza para recuperar opciones en forma de matriz. En este contexto,
la clase `RoleSelect` es responsable de proporcionar opciones relacionadas con los roles obteniendo
datos de la fábrica de recopilación de roles y devolviéndolos en una serie de opciones. */
class RoleSelect implements OptionSourceInterface
{
    protected $roleCollectionFactory;

    /**
     * La función es un constructor que inicializa una fábrica de colección de roles en un módulo
     * Magento.
     *
     * @param \Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory
     * roleCollectionFactory El parámetro `roleCollectionFactory` es una instancia de la clase
     * `\Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory`. Se utiliza para crear
     * colecciones de entidades de roles en Magento. Esta clase de fábrica ayuda a obtener datos de
     * roles de la base de datos y proporciona métodos para trabajar con colecciones de roles de manera
     * eficiente.
     */
    public function __construct(

        \Magento\Authorization\Model\ResourceModel\Role\Grid\CollectionFactory $roleCollectionFactory,
    ) {
        $this->roleCollectionFactory = $roleCollectionFactory;
    }


    /**
     * La función recupera datos de rol con los campos role_id y role_name filtrados por role_type 'G'
     * y los devuelve como una matriz.
     *
     * Retorna una serie de opciones de roles con 'role_id' como valor y 'role_name' como etiqueta para
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

