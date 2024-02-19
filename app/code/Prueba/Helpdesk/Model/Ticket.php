<?php

namespace Prueba\Helpdesk\Model;

use Magento\Framework\Model\AbstractModel;

class Ticket extends AbstractModel
{
    const STATUS_OPENED = 1;
    const STATUS_CLOSED = 2;
    const SEVERITY_LOW = 1;
    const SEVERITY_MEDIUM = 2;
    const SEVERITY_HIGH = 3;

    protected static $statusesOptions = [
        self::STATUS_OPENED => 'Opened',
        self::STATUS_CLOSED => 'Closed',
    ];

    protected static $severitiesOptions = [
        self::SEVERITY_LOW => 'Low',
        self::SEVERITY_MEDIUM => 'Medium',
        self::SEVERITY_HIGH => 'High',
    ];
    /**
    * Initialize resource model
    * @return void
    */
    protected function _construct()
    {
        $this->_init('Prueba\Helpdesk\Model\ResourceModel\Ticket');
    }


    public static function getSeveritiesOptionArray()
    {
        $result = [];

        foreach(self::$severitiesOptions as $value => $label){
            $result[] = [
                'label' => $label,
                'value' => $value
            ];
        }
        return $result;
    }


    public static function getStatusesOptionArray()
    {
        $result = [];

        foreach(self::$statusesOptions as $value => $label){
            $result[] = [
                'label' => $label,
                'value' => $value
            ];
        }
        return $result;
    }

    public function getStatusAsLabel()
    {
        return self::$statusesOptions[$this->getstatus()];
    }

    public function getSeverityAsLabel()
    {
        return self::$severitiesOptions[$this->getSeverity()];
    }
}
