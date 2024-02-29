<?php

namespace Prueba\Asesor\Api\Data;

interface AsesorInterface
{

    const ENTITY_ID = 'entity_id';
    const REPORT_ID = 'report_id';
    const REPORT_NAME = 'report_name';
    const REPORT_LINK = 'report_link';
    const REPORT_DESCRIPTION = 'report_description';
    const TIME_STAMP = 'time_stamp';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Prueba\Asesort\Api\Data\
     */
    public function setEntityId($entityId);

    /**
     * Get report_id
     * @return string|null
     */
    public function getReportId();

    /**
     * Set report_id
     * @param string $reportId
     * @return \Prueba\Asesor\Api\Data\
     */
    public function setReportId($reportId);

    /**
     * Get report_name
     * @return string|null
     */
    public function getReportName();

    /**
     * Set report_name
     * @param string $reportName
     * @return \Prueba\Asesor\Api\Data\
     */
    public function setReportName($reportName);

    /**
     * Get report_link
     * @return string|null
     */
    public function getReportLink();

    /**
     * Set report_link
     * @param string $reportLink
     * @return \Prueba\Asesor\Api\Data\
     */
    public function setReportLink($reportLink);

    /**
     * Get report_description
     * @return string|null
     */
    public function getReportDescription();

    /**
     * Set report_description
     * @param string $reportDescription
     * @return \Prueba\Asesor\Api\Data\
     */
    public function setReportDescription($reportDescription);

    /**
     * Get time_stamp
     * @return string|null
     */
    public function getTimeStamp();

    /**
     * Set time_stamp
     * @param string $timeStamp
     * @return \Prueba\Asesor\Api\Data\
     */
    public function setTimeStamp($timeStamp);

    

}

