<?php
declare(strict_types=1);

namespace Milan\AddReport\Block\Adminhtml\Index\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

/* La instrucción `class Delete extends Generic implements ButtonProviderInterface` en el código define
una nueva clase PHP llamada `Delete` que extiende la clase `Generic` e implementa la interfaz
`ButtonProviderInterface`. */
class Delete extends Generic implements ButtonProviderInterface
{

    /**
     * @return array
     */
    /* El método `public function getButtonData()` es responsable de proporcionar los datos que definen
    el comportamiento y la apariencia del botón "Eliminar" en la interfaz de usuario. Dentro de este
    método, se construye una matriz con pares clave-valor que especifican varios atributos del
    botón, como etiqueta, clase, comportamiento al hacer clic y orden de clasificación. */
    public function getButtonData()
    {
        $data = [];
        if ($this->$data) {
            $data = [
                'label' => __('Delete Reporte'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     */
   /* El método `función pública getDeleteUrl()` es responsable de generar la URL a la que apuntará el
   botón "Eliminar" cuando se haga clic. En este fragmento de código PHP específico, el método
   consiste en construir una URL utilizando el mecanismo de generación de URL de Magento. La URL se
   crea en función de la ruta actual y los parámetros proporcionados en la llamada al método. */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['role_id' => $this->getButtonData()]);
    }

}

