<?php

namespace Milan\AddReport\Model;

use Milan\AddReport\Model\ResourceModel\Reportes\CollectionFactory;

/* La clase `DataProviderReportes` está extendiendo la clase
`\Magento\Ui\DataProvider\AbstractDataProvider`. Al hacer esto, la clase `DataProviderReportes`
hereda la funcionalidad y propiedades de la clase `AbstractDataProvider`. Esto permite que la clase
`DataProviderReportes` actúe como proveedor de datos para los componentes de la interfaz de usuario
en un módulo Magento. */
class DataProviderReportes extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Constructor de la clase.
     *
     * @param string $name El nombre del componente.
     * @param string $primaryFieldName El nombre del campo principal del componente.
     * @param string $requestFieldName El nombre del campo de solicitud del componente.
     * @param CollectionFactory $reportesFactory Una fábrica para crear colecciones de objetos Reportes.
     * @param array $meta Metadatos para el componente, opcional.
     * @param array $data Datos adicionales para el componente, opcional.
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $reportesFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $reportesFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $_reportes) {
            $this->loadedData[$_reportes->getId()] = $_reportes->getData();
        }
        return $this->loadedData;
    }
}