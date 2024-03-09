<?php
declare(strict_types=1);

namespace Milan\AddReport\Model\ResourceModel\Reportes;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/* La `clase Colecction extiende AbstractCollection` define una clase de colección personalizada para un
módulo Magento 2. En Magento 2, las colecciones se utilizan para recuperar y trabajar con múltiples
registros de bases de datos a la vez. Al extender `AbstractCollection`, esta clase de colección
personalizada hereda la funcionalidad y los métodos proporcionados por el marco de colección de
Magento. */
class Collection extends AbstractCollection
{
    /**
     * ID Field name
     *
     * @var string
     */
    private $idFieldName = 'entity_id';

    /**
     * La función _construct inicializa las clases de modelo y modelo de recursos para el módulo
     * Reportes en PHP.
     */
    protected function _construct()
    {
        $this->_init(
            \Milan\AddReport\Model\Reportes::class,
            \Milan\AddReport\Model\ResourceModel\Reportes::class
        );
    }

    /**
     * La función `getFieldName` devuelve el valor de la propiedad `idFieldName`.
     *
     * El método `getFieldName()` devuelve el valor de la propiedad `$idFieldName` del objeto
     * actual.
     */
    protected function getFieldName()
    {
        return $this->idFieldName;
    }

}