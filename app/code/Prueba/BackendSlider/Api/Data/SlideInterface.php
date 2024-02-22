<?php

namespace Prueba\BackendSlider\Api\Data;
/**
* @api
*/


interface SlideInterface
{
    const PROPERTY_ID = 'slide_id';
    const PROPERTY_SLIDE_ID = 'slide_id';
    const PROPERTY_TITLE = 'title';

    /**
     * Get Slidet entity 'slide_id' property value
     * @return int|null
     */
    public function getId();

    /**
     * Set Slide entity 'slide_id' property value
     * @param int $id
     * @return $this
     */
    public function setId($id);


    /**
     * Get Slidet entity 'slide_id' property value
     * @return int|null
     */
    public function getSlideId();

    /**
     * Set Slide entity 'slide_id' property value
     * @param int $id
     * @return $this
     */
    public function setSlideId($slideId);

    /**
     * Get Slidet entity 'title' property value
     * @return string|null
     */
    public function getTitle();

    /**
     * Set Slide entity 'title' property value
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

}