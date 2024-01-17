<?php

declare(strict_types=1);

namespace Prueba\Promo\Block;

use Magento\Framework\View\Element\Template;

class Promo extends Template
{
    /**
     * @var \Magento\Catalog\Model\ProductRepository 
     */
    private $_productRepository;
    private $objectManager;


    public function __construct(        
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ProductRepository $productRepository, 
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->objectManager  = \Magento\Framework\App\ObjectManager::getInstance();
        $this->_productRepository = $productRepository;
       
    }

    
    public function getInsigniaParametro($productId)
    {        
        $data = null;
        $product = $this->_productRepository->getById($productId);
                
        if($product->getInsignia()){

            $swatchHelper = $this->objectManager->get("Magento\Swatches\Helper\Media");
            $swatchCollection = $this->objectManager->create('Magento\Swatches\Model\ResourceModel\Swatch\Collection');

            $swatchCollection->addFieldtofilter('option_id', $product->getInsignia());
            $item=$swatchCollection->getFirstItem();           
            
            $data['image'] = ($item->getValue()!=null)? $swatchHelper->getSwatchAttributeImage('swatch_thumb', $item->getValue()):'';
            $data['value'] = $product->getAttributeText('insignia');
            $data['color'] = $item->getValue();
        }
        return $data;
    }
    
}



// <?php if ($blockInsignia): ?
//     <?   if($insignia=$block):>
//     <?  endif; >
// < endif; >