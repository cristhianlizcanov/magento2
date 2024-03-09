<?php
declare(strict_types=1);

namespace Milan\Asesor\Model\ResourceModel\Asesores;

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
            \Milan\Asesor\Model\Asesores::class,
            \Milan\Asesor\Model\ResourceModel\Asesores::class
        );
    }
}