<?php

namespace Prueba\Asesor\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class Link extends Column
{
      

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['report_link'])) {
                    $item[$this->getData('name')] = '<iframe src="' . $item['report_link'] . '"
                     title="' . $item['report_name'] . '"
                    width="400"
                    height="300">' . $item['report_link'] . '</iframe>';
                }
            }
        }

        return $dataSource;
    }


    public function getRoleId($roleName)
    {
        // Aquí debes implementar la lógica para obtener el role_id de la base de datos authorization_role
        // donde role_name es igual a Vendedor.
        // Puedes usar el objeto $this->bookmarkRepository para interactuar con la base de datos.
        // Devuelve el role_id.


        if ($roleName === 'Vendedor') {
            $roles = $this->getRoles();
            $this->_role = $this->_roleFactory->create();
            if ($roles && isset($roles[0]) && $roles[0]) {
                $this->_role->load($roles[0]);
            }

        }
        return $this->_role;
    }


}
