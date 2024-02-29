<?php
declare(strict_types=1);

namespace Prueba\Asesor\Model\ResourceModel\Asesores;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * ID Field name
     * 
     * @var string
     */
    protected $_idFieldName = 'entity_id';
  
    protected function _construct()
    {
        $this->_init(
            \Prueba\Asesor\Model\Asesores::class,
            \Prueba\Asesor\Model\ResourceModel\Asesores::class
        );
    }
}