<?php

namespace Milan\AddReport\Block;

use Magento\Framework\View\Element\Template;
use Milan\AddReport\Model\ResourceModel\Reportes\Collection as ReportesCollection;

/* La declaración `class Reportes extends Template` en el código PHP define una nueva clase llamada
`Reportes` que extiende la clase `Template`. Esto significa que la clase `Reportes` hereda
propiedades y métodos de la clase `Template`, lo que le permite usar y anular la funcionalidad
proporcionada por la clase `Template`. En este caso específico, la clase `Reportes` es una clase de
bloque utilizada en el desarrollo de Magento para manejar la lógica de presentación de un bloque
específico en la interfaz. */
class Reportes extends Template
{
    /**
     * collection
     *
     * @var ReportesCollection
     */
    protected $reportesCollection;
    /**
     * La función es un constructor PHP que inicializa una fábrica de colecciones para entidades de
     * informes.
     *
     * @param Template\Context context El parámetro `context` en el constructor es una instancia de la
     * clase `Template\Context`. Normalmente se utiliza para proporcionar información de contexto y
     * recursos a la instancia de clase actual.
     * @param \Milan\AddReport\Model\ResourceModel\Reportes\Collection collectionFactory El
     * parámetro `$collectionFactory` en el constructor es una instancia de
     * `\Milan\AddReport\Model\ResourceModel\Reportes\CollectionFactory`. Esta clase de fábrica se
     * utiliza normalmente para crear colecciones de entidades de informes en Magento 2. Proporciona
     * métodos para recuperar y trabajar con colecciones de datos de informes de la base de datos.
     * @param array data El parámetro `$data` en el constructor es una matriz que le permite pasar
     * datos adicionales al objeto del que se crea una instancia. Esto puede resultar útil para
     * proporcionar opciones de configuración u otra información contextual al objeto durante la
     * inicialización.
     */
    public function __construct(
            Template\Context $context,
            ReportesCollection $collectionFactory,
            array $data = [])
    {
        $this->remoColFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return ReportesCollection
     */
    /* El método `función pública getDemoItems()` en el código PHP proporcionado es una función pública
    definida dentro de la clase `Reportes`. Este método es responsable de devolver una colección de
    elementos de demostración de `ReportesCollection`. */
    public function getDemoItems()
    {
        if(null === $this->reportesCollection) {
            $this->reportesCollection = $this->create();
        }

        return $this->reportesCollection;
    }
}