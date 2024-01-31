<?php

namespace Prueba\Promo\Controller\AdminHtml\Catalog\Category\Widget;

class Chooser extends \Magento\Catalog\Controller\Adminhtml\Category\Widget\Chooser
{
    protected function _getCategoryTreeBlock()
    {
     return $this->layoutFactory->create()->createBlock('Prueba\Promo\Block\Adminhtml\Catalog\Category\Widget\Chooser','',['data' => ['id' => $this->getRequest()->getParam('uniq_id'), 'use_massaction' => $this->getRequest()->getParam('use_massaction', false),]]);
    }


}
