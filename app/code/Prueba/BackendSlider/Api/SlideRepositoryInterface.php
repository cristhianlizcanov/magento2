<?php

namespace Prueba\BackendSlider\Api;

/**
* @api
*/
interface SlideRepositoryInterface
{
    /**
     * Retrieve slide entity.
     * @param int $slideId
     * @return \Prueba\BackendSlider\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\NoSuchEntittyException 
     * @throws \Magento\Framework\Exception\LocalizedExeption
     */
    public function getById($slideId);

    /**
     * Save slide.
     * @param \Prueba\BackendSlider\Api\Data\SlideInterface $slide
     * @return \Prueba\BackendSlider\Api\Data\SlideInterface
     * @throws \Magento\Framework\Exception\LocalizedExeption
     */
    public function save(\Prueba\BackendSlider\Api\Data\SlideInterface $slide);

    /**
     * Rerieve slides matching the specified criteria
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Framework\Api\SearchCriteriaInterface
     * @throws \Magento\Framework\Exception\LocalizedExeption
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete slide by ID
     * @param int $slideId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedExeption
     */
    public function deleteById($slideId);
    
}