<?php

namespace Prueba\CustomGridBack\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CustomColumn extends Column
{
    protected $customerFactory;
    protected $searchCriteria;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        SearchCriteriaBuilder $criteria,
        array $components = [],
        array $data = []
    ) {
        $this->searchCriteria = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = "admin - " . $this->getData('name');
            }
        }

        return $dataSource;
    }
}