<?php

namespace Prueba\Rules\Controller\Adminhtml\Example\Rule;

use Prueba\Rules\Controller\Adminhtml\Example\Rule;

/* La clase Index extiende Rule y contiene un método de ejecución para configurar y mostrar reglas de
ejemplo. */
class Index extends Rule
{
    protected  const DIS = 'Example Rules';

    /**
     * Index action
     * La función ejecuta acciones para configurar y representar un diseño para mostrar reglas de
     * ejemplo.
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_addBreadcrumb(__(static::DIS), __(static::DIS));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__(static::DIS));
        $this->_view->renderLayout('root');
    }
}
