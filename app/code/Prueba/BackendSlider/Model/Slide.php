<?php

namespace Prueba\BackendSlider\Model;

class Slide extends \Magento\Framework\Model\AbstractModel implements \Prueba\BackendSlider\Api\Data\SlideInterface
{
    /**
     * Initialize
     * 
     * @return void
     */
    protected function _construct()
    {
        /* int */
        $this->_init('Prueba\BackendSlider\Model\ResourceModel\Slide');
    }

    /**
     * Get Slide entity
     * 
     * @api
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::PROPERTY_ID);
    }

    /**
     * Set Slide entity 'slide_id'
     */
    public function setId($id)
    {
        $this->setData(self::PROPERTY_ID, $id);        
        return $this;
    }


        /**
     * Get Slide entity
     * 
     * @api
     * @return int|null
     */
    public function getSlideId()
    {
        return $this->getData(self::PROPERTY_SLIDE_ID);
    }

    /**
     * Set Slide entity 'slide_id'
     */
    public function setSlideId($id)
    {
        $this->setData(self::PROPERTY_SLIDE_ID, $id);        
        return $this;
    }


            /**
     * Get Slide entity
     * 
     * @api
     * @retunr int|null
     */
    public function getTitle()
    {
        return $this->getData(self::PROPERTY_TITLE);
    }

    /**
     * Set Slide entity 'slide_id'
     */
    public function setTitle($title)
    {
        $this->setData(self::PROPERTY_TITLE, $title);        
        return $this;
    }
}