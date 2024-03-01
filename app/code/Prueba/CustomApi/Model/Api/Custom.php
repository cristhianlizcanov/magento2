<?php

namespace Prueba\CustomApi\Model\Api;

use Prueba\CustomApi\Api\CustomInterface;
use Prueba\BackendDev\Model\DemoFactory as ModuleFactory;

//use Prueba\BackendSlider\Model\SlideFactory as ModuleFactory;

class Custom implements CustomInterface
{
    private $moduleFactory;
    private $quote;
    protected $response = ['success' => false];

    public function __construct(ModuleFactory $moduleFactory, \Magento\Quote\Model\Quote $quote)
    {
        $this->quote = $quote;
        $this->moduleFactory = $moduleFactory;
    }

    /** * GET for Post api * @param string $title * @return string */
    public function getPost($title)
    {
        try {
            $insertData = $this->moduleFactory->create();
            $insertData->setTitle($title)->save();
            $response = ['success' => true, 'message' => $title];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        return $response;
    }

    /** * @return string */
    public function getData()
    {
        try {
            $data = $this->moduleFactory->create()->getCollection()->getData();
            return $data;
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /** @param int $id
     *   @return string
     **/
    public function getDelete($id)
    {
        $response = array();
        if ($id) {
            try {
                $data = $this->moduleFactory->create()->load($id);
                if (count($data->getData()) > 0) {
                    $data->delete();
                    $response = ["success" => true, 'message' => "Campo " . $id . " fue eliminado"];
                } else {
                    $response = ["success" => false, 'message' => "Error el registro " . $id . " No existe"];
                }
            } catch (\Exception $e) {
                $response = ['success' => false, 'message' => $e->getMessage()];
            }
            return $response;
        } else {
            return $response = ["success" => false, 'message' => "Es necesario un parametro ID"];
        }

    }


    /** * @param int $id * @return string */
    public function getById($id)
    {
        try {
            if ($id) {
                $data = $this->moduleFactory->create()->load($id)->getData();
                if (count($data) > 0) {
                    return ['success' => true, 'message' => json_encode($data)];
                } else {
                    return ['success' => false, 'message' => json_encode($data)];
                }
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }


    /** * GET for Post api * @param string $title * @return string */
    public function getEdit($title)
    {
        $edit = file_get_contents("php://input");
        $data = json_decode($edit, true);
        $insertData = $this->moduleFactory->create();
        $id = $data['id'];
        if ($id) {
            try {
                $insertData->load($id);
                $insertData->setTitle($data['title'])->save();
                $response = ['success' => true, 'message' => $data];
            } catch (\Exception $e) {
                $response = ['success' => false, 'message' => $e->getMessage()];
            }
        }
        return $response;
    }

}