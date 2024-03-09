<?php
namespace Milan\Asesor\Model\ResourceModel;

class Asesores extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('rutavity_reports', 'entity_id');
    }
}