<?php

namespace Prueba\PowerBi\Block\Adminhtml\Demo\Edit;

use Magento\Customer\Controller\RegistryConstants;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{
    protected $demoDataFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Prueba\PowerBi\Model\DemoFactory $demoDataFactory,
        array $data = []
    ) {
        $this->demoDataFactory = $demoDataFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     *
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $form = $this->_formFactory->create();

        $demoId = $this->_coreRegistry->registry('current_entity_id');

        if ($demoId === null) {
            
            $demoData = $this->demoDataFactory->create();
        } else {
        
            $demoData = $this->demoDataFactory->create()->load($demoId);
        }

        $yesNo = [];
        $yesNo[0] = 'No';
        $yesNo[1] = 'Yes';

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Infomation Initial')]);

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),
                'require' => true
            ]
        );

        $fieldset->addField(
            'is_visible',
            'select',
            [
                'name' => 'is_visible',
                'label' => __('Visible'),
                'title' => __('Visible'),
                'class' => 'required-entry',
                'values' => $yesNo,
            ]
        );

        if ($demoData->getId() !== null) {
            $form->addField('entity_id', 'hidden', ['name' => 'entity_id', 'value' => $demoData->getId()]);
        }

        if ($this->_backendSession->getDemoData()) {
            $form->addValues($this->_backendSession->getDemoData());
            $this->_backendSession->setDemoData(null);
        } else {
            $form->addValues(
                [
                    'id' => $demoData->getId(),
                    'title' => $demoData->getTitle(),
                    'is_visible' => $demoData->getIsVisible(),
                ]
            );
        }

        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setMethod('post');
        $this->setForm($form);
    }
}