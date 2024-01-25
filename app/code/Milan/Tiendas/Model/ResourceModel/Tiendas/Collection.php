<?php
declare(strict_types=1);

namespace Milan\Tiendas\Model\ResourceModel\Tiendas;

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
            \Milan\Tiendas\Model\Tiendas::class,
            \Milan\Tiendas\Model\ResourceModel\Tiendas::class
        );
    }
}