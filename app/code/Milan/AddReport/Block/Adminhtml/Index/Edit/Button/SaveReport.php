<?php

namespace Milan\AddReport\Block\Adminhtml\Index\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

/* La `clase SaveReport extiende Generic implements ButtonProviderInterface` está definiendo una clase
PHP llamada `SaveReport` que extiende la clase `Generic` e implementa la interfaz
`ButtonProviderInterface`. Esta clase es responsable de proporcionar datos para un botón en la
interfaz adminhtml de un módulo Magento. El método `getButtonData()` dentro de esta clase devuelve
una matriz de datos que especifica la etiqueta, la clase, los atributos y el orden del botón. Es
probable que este botón se utilice para guardar un informe en la interfaz de administración. */
class SaveReport extends Generic implements ButtonProviderInterface
{
    /**
     * get button data
     *
     * @return array
     */
    /* El método `función pública getButtonData()` define los datos de un botón en la interfaz
    adminhtml de un módulo Magento. Devuelve una matriz de datos que especifica la etiqueta, clase,
    atributos y orden del botón. En este caso específico, el método establece la etiqueta del botón
    en 'Guardar informe', le asigna la clase 'guardar principal', define los atributos de datos para
    la inicialización y la función del formulario, y establece el orden de clasificación en 90. Este
    método esencialmente proporciona la configuración de cómo debe aparecer y comportarse el botón
    en la interfaz de usuario. */
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