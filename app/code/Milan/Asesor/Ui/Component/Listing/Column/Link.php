<?php

namespace Milan\Asesor\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\User\Model\UserFactory;


class Link extends Column
{
    protected $userFactory;
    public function _construct(
        UserFactory $userFactory
    ) {
        $this->useFactory = $userFactory;
    }

    public function getUserId()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->get('Magento\Backend\Model\Auth\Session')->getUser()->getID();
    }

    public function prepareDataSource(array $dataSource)
    {
        
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['report_link'])) {
                    $item[$this->getData('name')] = [
                        'informe' => [
                            'href' => $item['report_link'] . $this->getUserId(),
                            'label' => __('Ver Informe'),
                            'target' => '_blank'

                        ]
                    ];
                }
            }
        }
    
        return $dataSource;
    }

}
