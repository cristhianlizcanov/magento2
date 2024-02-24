<?php
          
namespace PowerBi\PowerBi\Model\ResourceModel\Demo;

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
        $this->_init('PowerBi\PowerBi\Model\Demo', 'PowerBi\PowerBi\Model\ResourceModel\Demo');
    }
}