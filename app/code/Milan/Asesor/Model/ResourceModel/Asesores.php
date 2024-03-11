<?php
namespace Milan\Asesor\Model\ResourceModel;

/* La clase Asesores extiende de AbstractDb de Magento. Se utiliza para manejar los
   recursos de la base de datos para el modelo Asesores. */
class Asesores extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /* La función constructora se llama automáticamente al instanciar la clase. Inicializa la tabla
        'rutavity_reports' y su campo ID 'entity_id' */
    protected function _construct()
    {
        $this->_init('rutavity_reports', 'entity_id');
    }
}