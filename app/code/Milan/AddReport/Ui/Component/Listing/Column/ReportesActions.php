<?php

namespace Milan\AddReport\Ui\Component\Listing\Column;


/* La clase ReportesActions extiende de la clase \Magento\Ui\Component\Listing\Columns\Column y se
   utilza para definir las acciones de los elementos en una lista de usuario Magento */
class ReportesActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_EDIT_PATH = 'reportes/reportes/edit';
    const URL_DELETE_PATH = 'reportes/reportes/delete';

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

     /* La función constructora inicializa la instancia de la clase con los
     objectos necesarios y llama al constructo de la clase padre. */
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
    
    /* La función prepareDataSource prepara los datos para la lista de la interfaz de usuario, añade las acciones
      de edición y eliminación a cada elemento de la lista. */
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
                    ];
                }
            }
        }
        return $dataSource;
    }
}