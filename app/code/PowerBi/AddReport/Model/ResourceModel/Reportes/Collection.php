<?php
declare(strict_types=1);

namespace PowerBi\AddReport\Model\ResourceModel\Reportes;

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
            \PowerBi\AddReport\Model\Reportes::class,
            \PowerBi\AddReport\Model\ResourceModel\Reportes::class
        );
    }
}