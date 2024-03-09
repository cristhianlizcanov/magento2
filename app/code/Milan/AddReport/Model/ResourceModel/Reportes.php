<?php
namespace Milan\AddReport\Model\ResourceModel;

/* Este fragmento de código PHP define una clase llamada `Reportes` que extiende la clase
`\Magento\Framework\Model\ResourceModel\Db\AbstractDb`. Al extender esta clase, la clase `Reportes`
hereda la funcionalidad para interactuar con la base de datos en el contexto de los modelos Magento. */
class Reportes extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /* El método `función protegida _construct()` en este fragmento de código PHP es un método especial
    utilizado en Magento para inicializar el modelo de recursos. Dentro de este método, la función
    `_init()` se llama con dos parámetros: el nombre de la tabla `rutavity_reports` y la columna de
    clave principal `entity_id`. Este método es responsable de configurar la tabla de la base de
    datos y la columna de clave principal para el modelo de recurso "Reportes". */
    protected function _construct()
    {
        $this->_init('rutavity_reports', 'entity_id');
    }
}