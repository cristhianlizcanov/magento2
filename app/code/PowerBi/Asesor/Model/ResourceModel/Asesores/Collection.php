<?php
declare(strict_types=1);

namespace PowerBi\Asesor\Model\ResourceModel\Asesores;

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
            \PowerBi\Asesor\Model\Asesores::class,
            \PowerBi\Asesor\Model\ResourceModel\Asesores::class
        );
    }
}