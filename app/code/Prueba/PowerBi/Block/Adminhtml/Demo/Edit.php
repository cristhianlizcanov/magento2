<?php

namespace Prueba\PowerBi\Block\Adminhtml\Demo;


use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{

    protected $coreRegistry;
    protected $demoId = false;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ){        
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);        
    }

    protected function _construct()
    {    
        $this->_objectId = 'entity_id';
        $this->_controller = 'adminhtml_demo';
        $this->_blockGroup = 'Prueba_PowerBi';
        
        parent::_construct();

        $demoId = $this->getDemoId();
        if(!$demoId){
            $this->buttonList->remove('delete');
        }
    }

    public function getHeaderText()
    {
        $demoId = $this->getDemoId();

        if(!$demoId){
            return __('New DemoList Item');
        } else {
            return __('Edit DemoList Item');
        }
    }

    public function getDemoId()
    {
        if(!$this->demoId){
            $this->demoId = $this->coreRegistry->registry('current_entity_id');
        }
        return $this->demoId;
    }
}