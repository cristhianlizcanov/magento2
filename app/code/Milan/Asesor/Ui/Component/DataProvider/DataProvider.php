<?php

namespace Milan\Asesor\Ui\Component\DataProvider;


use Milan\Asesor\Helper\UserHelper;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\Reporting;

/* La clase DataProvider extiende de DataProvider de Magento. Se utiliza para
   proporcionar datos de Asesores.  */
class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{

     /**
     * @var UserHelper
     */
    protected $authUser;

    /**
     * Constructor de la clase DataProvider.
     * Inicializa las propiedades $authUser.
     * Si el usuario autenticado no es un administrador, aplica un filtro de rol.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Reporting $reporting
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param RequestInterface $request
     * @param FilterBuilder $filterBuilder
     * @param array $meta
     * @param array $data
     */

     /* La función constructora se llama automáticamente al instanciar la clase. Inicializa la
        propiedad $authUser. Si el usuario autenticado no es un administrador, aplica un filtro rol. */
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
     * Aplica un filtro de rol al conjunto de datos.
     *
     * @param int $role
     */
    
     /* La función roleIdFilter() aplica un filtro de rol al conjunto de datos. El filtro se aplica al campo 'role_id'
        y solo incluye los elementos que tienen un 'role_id' igual al valor proporcionado.
      */
     public function roleIdFilter($role)
    {

                $this->addFilter(
                    $this->filterBuilder->setField('role_id')
                        ->setValue($role)
                        ->setConditionType('eq')
                        ->create()
                );
            
        
    }


    
}
