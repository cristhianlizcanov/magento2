<?php
namespace Milan\Tiendas\Model\ResourceModel;

class Tiendas extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('milan_tiendas', 'entity_id');
    }
}