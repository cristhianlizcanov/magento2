<?php
/**
 * Show customers by company's sales representative permission
 * @package Wagento_SalesRepresentative
 * @author Rudie Wang <rudi.wang@wagento.com>
 */
namespace Prueba\Asesor\Ui\Component\DataProvider;


use Prueba\Asesor\Helper\UserHelper;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\Reporting;
use Wagento\SalesRepresentative\Helper\Data as SalesRepresentativeHelper;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{

    protected $authUser;

    protected $loadedData;


    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Reporting $reporting
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param RequestInterface $request
     * @param FilterBuilder $filterBuilder
     * @param array $meta
     * @param array $data
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Reporting $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        UserHelper $authUser,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );

       $this->authUser = $authUser;
       if(!$this->authUser->isAdmin()){

           $this->roleIdFilter($authUser->getUserRole()->getId());
       }

    }

    /**
     * Filter grid items by company's sales representative
     * @return void
     */
    public function roleIdFilter($role)
    {
        // check if sales representative user
     
                $this->addFilter(
                    $this->filterBuilder->setField('role_id')
                        ->setValue($role)
                        ->setConditionType('eq')
                        ->create()
                );
            
        
    }


    
}
