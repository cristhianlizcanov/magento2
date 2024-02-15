<?php

namespace Prueba\TypeProduct\Model\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Prueba\TypeProduct\Logger\Custom;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;
use Magento\Eav\Model\Config;
use Magento\Framework\Event\ManagerInterface;
use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\Framework\Registry;
use Magento\Framework\Filesystem;
use Magento\Catalog\Model\Product\Option;
use Magento\Catalog\Model\Product\Type;
use Psr\Log\LoggerInterface;

class Ticket extends AbstractType
{
    const TYPE_ID = 'ticket';
    protected $pLogger;

    // \Magento\Framework\Serialize\Serializer\Json $serializer = null,				
//UploaderFactory $uploaderFactory = null				
    public function __construct(
        Type $catalogProductType,
        Option $catalogProductOption,
        Config $eavConfig,
        ManagerInterface $eventManager,
        Database $filesStorageDb,
        Filesystem $filesystem,
        Registry $coreRegistry,
        Custom $logger,
        ProductRepositoryInterface $productRepository

    ) {
        $this->pLogger = $logger;
        parent::__construct(
            $catalogProductOption,
            $eavConfig,
            $catalogProductType,
            $eventManager,
            $filesStorageDb,
            $filesystem,
            $coreRegistry,
            $logger,
            $productRepository
        );
        
        $this->messagesCustom();
    }

    public function messagesCustom()
    {
        
        // Registra un mensaje de advertencia en el archivo de registro	
        $this->pLogger->warning('Envío de mensaje warning al log');
    }

    public function save($product)
    {
        $this->messagesCustom();
        parent::save($product);
        return $this;
    }
    public function deleteTypeSpecificData(Product $product)
    {
        return $this;
    }
}
