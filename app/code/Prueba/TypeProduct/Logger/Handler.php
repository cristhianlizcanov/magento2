<?php
namespace Prueba\TypeProduct\Logger;
use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger;
class Handler
{
    /**
     * @var int
     */
    protected $loggerType = Logger::WARNING;

    /**
     * @var string
     */
    protected $fieldName = 'var/log/myLogCustom.log';

}
