<?php

namespace PowerBi\Asesor\Api\Data;

interface AsesorInterface
{

    const ENTITY_ID = 'entity_id';
    const ROLE_ID = 'role_id';
    const REPORT_NAME = 'report_name';
    const REPORT_LINK = 'report_link';
    const REPORT_DESCRIPTION = 'report_description';
    const CREATED_AT = 'created_at';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \PowerBi\Asesort\Api\Data\
     */
    public function setEntityId($entityId);

    /**
     * Get role_id
     * @return string|null
     */
    public function getReportId();

    /**
     * Set role_id
     * @param string $reportId
     * @return \PowerBi\Asesor\Api\Data\
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
     * @return \PowerBi\Asesor\Api\Data\
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
     * @return \PowerBi\Asesor\Api\Data\
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
     * @return \PowerBi\Asesor\Api\Data\
     */
    public function setReportDescription($reportDescription);

    /**
     * Get created_at
     * @return string|null
     */
    public function getTimeStamp();

    /**
     * Set created_at
     * @param string $timeStamp
     * @return \PowerBi\Asesor\Api\Data\
     */
    public function setTimeStamp($timeStamp);

    

}

