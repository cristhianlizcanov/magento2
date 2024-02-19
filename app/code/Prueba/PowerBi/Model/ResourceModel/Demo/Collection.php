<?php
          
namespace Prueba\PowerBi\Model\ResourceModel\Demo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     *@var string 
     */
    protected $_idFieldName = 'entity_id';
    
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Prueba\PowerBi\Model\Demo', 'Prueba\PowerBi\Model\ResourceModel\Demo');
    }
}