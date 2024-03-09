<?php

namespace Milan\AddReport\Block\Adminhtml\Index\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

/* La declaración `class Save extends Generic implements ButtonProviderInterface` en el fragmento de
código PHP define una nueva clase llamada `Save` que extiende la clase `Generic` e implementa la
interfaz `ButtonProviderInterface`. */
class Save extends Generic implements ButtonProviderInterface
{
    /**
     * get button data
     *
     * @return array
     */
    /* El método `función pública getButtonData()` define los datos de un botón en un formulario de
    administración de Magento. Devuelve una matriz con propiedades como la etiqueta del botón, la
    clase, los atributos de datos y el orden de clasificación. Este método se utiliza para
    configurar la apariencia y el comportamiento del botón "Guardar informe" en la interfaz del
    formulario de administración. */
    public function getButtonData()
    {
        return [
            'label' => __('Save Report'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}