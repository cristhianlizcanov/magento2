<?php

namespace Prueba\Asesor\Ui\Component\Listing\Column;

class AsesoresActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_EDIT_PATH = 'asesores/asesores/edit';
    const URL_DELETE_PATH = 'asesores/asesores/delete';

    const URL_ADD_PATH = 'asesores/asesores/addreporte';

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param \Magento\Framework\UrlInterface                              $urlBuilder
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory           $uiComponentFactory
     * @param array
     * @param array
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\View\Element\Uicomponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ){
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    
    public function prepareDataSource(array $dataSource)
    {
        if(isset($dataSource['data']['items'])){
            foreach($dataSource['data']['items'] as &$item){
                if(isset($item['entity_id'])){
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT_PATH,
                                [
                                    'entity_id' => $item['entity_id'],
                                ]
                            ),
                            'label' => __('Edit'),
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_DELETE_PATH,
                                [
                                    'entity_id' => $item['entity_id'],
                                ]
                            ),
                            'label' => __('Delete'),
                        ],
                        'addreporte' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_ADD_PATH,
                                [
                                    'entity_id' => $item['entity_id'],
                                ]
                            ),
                            'label' => __('Add Asesor to Link'),
                        
                        ],
                    ];
                }
            }
        }
        return $dataSource;
    }
}