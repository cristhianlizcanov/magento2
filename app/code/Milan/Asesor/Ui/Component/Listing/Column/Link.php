<?php

namespace Milan\Asesor\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\User\Model\UserFactory;

/* La clase Link extiende de la clase Column de Magento. Se utiliza para manejar columnas de
   enlaces en la interfaz de usuario. */
class Link extends Column
{
    /**
     * @var UserFactory
     */
    protected $userFactory;

     /**
     * Constructor de la clase Link.
     * Inicializa la propiedad $userFactory.
     *
     * @param UserFactory $userFactory
     */
    public function _construct(
        UserFactory $userFactory
    ) {
        $this->useFactory = $userFactory;
    }

    /**
     * La función getUserId() Obtiene el ID del usuario actualmente autenticado.
     *
     * @return int El ID del usuario.
     */
    public function getUserId()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getID();
    }

    /**
     * La función prepareDataSource() prepara los datos para la fuente de datos.
     * Si el elemento tiene un 'report_link', concatena el Id de la función getUserId()
     * al informe en los datos del elemento.
     *
     * @param array $dataSource
     * @return array Los datos de la fuente de datos.
     */
    public function prepareDataSource(array $dataSource)
    {
        
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['report_link'])) {
                    $item[$this->getData('name')] = '
                    <iframe id="myframe" title="Ver Informe" width="1300" height="1300"></iframe>
                    <script>
                        document.getElementById("myframe").src = "' . $item['report_link'] . $this->getUserId() . '";
                    </script>';
                }
            }
        }
    
        return $dataSource;
    }

}


