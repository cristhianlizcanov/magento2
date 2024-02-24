<?php
namespace PowerBi\AddReport\Model\ResourceModel;

class Reportes extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('admin_reports', 'entity_id');
    }
}