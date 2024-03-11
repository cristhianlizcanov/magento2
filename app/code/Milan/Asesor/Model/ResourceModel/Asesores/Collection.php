<?php
declare(strict_types=1);

namespace Milan\Asesor\Model\ResourceModel\Asesores;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/* La clase Collection extiende de AbstractCollection de Magento. Se utiliza
   para manejar colecciones de objectos de tipo asesores */

class Collection extends AbstractCollection
{
    /**
     * ID Field name
     *
     * @var string
     */
    private $idFieldName = 'entity_id';
    
    /* La función constructora se llama automaticamente al instanciar la clase. Inicializa la clase Asesores
       y su modelo de recursos. */
    protected function _construct()
    {
        $this->_init(
            \Milan\Asesor\Model\Asesores::class,
            \Milan\Asesor\Model\ResourceModel\Asesores::class
        );
    }
    
    /* La función getFieldName() devuelve el nombre del campo ID, que es 'entity_id' */
    protected function getFieldName()
    {
        return $this->idFieldName;
    }
}