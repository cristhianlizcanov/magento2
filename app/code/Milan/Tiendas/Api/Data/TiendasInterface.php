<?php

namespace Milan\Tiendas\Api\Data;

interface TiendasInterface
{

    const ENTITY_ID = 'entity_id';
    const STORE_ID = 'store_id';
    const STORE_NAME = 'store_name';
    const STORE_IMAGE = 'store_image';
    const STORE_DESCRIPTION = 'store_description';
    const STORE_ADDRESS = 'store_address';
    const STORE_HOURS = 'store_hours';
    const STORE_DIRECTIONS = 'store_directions';
    const STORE_MAP = 'store_map';
    const STORE_MORE = 'store_more';
    const STORE_PHONE = 'store_phone';

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setEntityId($entityId);

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store_id
     * @param string $storeId
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreId($storeId);

    /**
     * Get store_name
     * @return string|null
     */
    public function getStoreName();

    /**
     * Set store_name
     * @param string $storeName
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreName($storeName);

    /**
     * Get store_image
     * @return string|null
     */
    public function getStoreImage();

    /**
     * Set store_image
     * @param string $storeImage
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreImage($storeImage);

    /**
     * Get store_description
     * @return string|null
     */
    public function getStoreDescription();

    /**
     * Set store_description
     * @param string $storeDescription
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreDescription($storeDescription);

    /**
     * Get store_address
     * @return string|null
     */
    public function getStoreAddress();

    /**
     * Set store_address
     * @param string $storeAddress
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreAddress($storeAddress);

    /**
     * Get store_hours
     * @return string|null
     */
    public function getStoreHours();

    /**
     * Set store_hours
     * @param string $storeHours
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreHours($storeHours);

    /**
     * Get store_directions
     * @return string|null
     */
    public function getStoreDirections();

    /**
     * Set store_directions
     * @param string $storeDirections
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreDirections($storeDirections);

    /**
     * Get store_map
     * @return string|null
     */
    public function getStoreMap();

    /**
     * Set store_map
     * @param string $storeMap
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreMap($storeMap);

    /**
     * Get store_mores
     * @return string|null
     */
    public function getStoreMore();

    /**
     * Set store_more
     * @param string $storeMore
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStoreMore($storeMore);

    /**
     * Get store_phone
     * @return string|null
     */
    public function getStorePhone();

    /**
     * Set store_phone
     * @param string $storePhone
     * @return \Milan\Tiendas\Api\Data\TiendasInterface
     */
    public function setStorePhone($storePhone);
    

}

