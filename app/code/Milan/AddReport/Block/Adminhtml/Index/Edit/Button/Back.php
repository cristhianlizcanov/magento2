<?php

namespace Milan\AddReport\Block\Adminhtml\Index\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

/* La instrucción `class Back extends Generic implements ButtonProviderInterface` en el código PHP
proporcionado define una nueva clase PHP llamada `Back` que extiende la clase `Generic` e implementa
la interfaz `ButtonProviderInterface`. */
class Back extends Generic implements ButtonProviderInterface
{
    /**
     * Get button data
     *
     * @return array
     */
    /* El método `función pública getbuttonData()` en el código PHP proporcionado es responsable de
    devolver una matriz de datos que define las propiedades de un botón. En este caso, se trata de
    definir los datos para un botón "Atrás" que se mostrará en la interfaz de administración. */
    public function getbuttonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }
    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    /* El método `función pública getBackUrl()` es responsable de devolver la URL a la que navegará el
    botón "Atrás" cuando se haga clic. En este fragmento de código PHP específico, el método utiliza
    la funcionalidad de generación de URL de Magento para construir la URL que llevará al usuario a
    la página o ubicación anterior dentro de la interfaz de administración de Magento. */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}