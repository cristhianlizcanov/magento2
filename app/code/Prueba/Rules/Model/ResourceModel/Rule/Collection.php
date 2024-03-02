<?php

namespace Prueba\Rules\Model\ResourceModel\Rule;

use Psr\Log\LoggerInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Data\Collection\EntityFactory;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Rule\Model\ResourceModel\Rule\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $date;

    /**
     * @param \Magento\Framework\Data\Collection\EntityFactory $entityFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Framework\Event\ManagerInterface $eventManager
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date
     * @param mixed $connection
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource
     */
    public function __construct(
        EntityFactory $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        TimezoneInterface $date,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->date = $date;
    }

    /**
     * Set resource model and determine field mapping
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Prueba\Rules\Model\Rule', 'Prueba\Rules\Model\ResourceModel\Rule');
    }

    /**
     * Filter collection by specified date.
     * Filter collection to only active rules.
     *
     * @param string|null $now
     * @use $this->addStoreGroupDateFilter()
     * @return $this
     */
    public function setValidationFilter($now = null)
    {
        if (!$this->getFlag('validation_filter')) {
            $this->addDateFilter($now);
            $this->addIsActiveFilter();
            $this->setOrder('sort_order', self::SORT_ORDER_DESC);
            $this->setFlag('validation_filter', true);
        }

        return $this;
    }

    /**
     * From date or to date filter
     *
     * @param $now
     * @return $this
     */
    public function addDateFilter($now)
    {
        $this->getSelect()->where(
            'from_date is null or from_date <= ?',
            $now
        )->where(
            'to_date is null or to_date >= ?',
            $now
        );

        return $this;
    }
}