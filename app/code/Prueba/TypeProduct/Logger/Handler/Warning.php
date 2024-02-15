<?php

namespace Prueba\TypeProduct\Logger\Handler;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class Warning extends Base
{
    /**
     * loggin level
     * @variant
     */
    protected $loggerType = Logger::WARNING;

    protected $fileName = 'var/log/myLogCustom.log';
}
