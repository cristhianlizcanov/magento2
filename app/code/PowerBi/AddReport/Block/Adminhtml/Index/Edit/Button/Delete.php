<?php
declare(strict_types=1);

namespace PowerBi\AddReport\Block\Adminhtml\Index\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic;

class Delete extends Generic implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getModelId()) {
            $data = [
                'label' => __('Delete Reporte'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['report_id' => $this->getModelId()]);
    }
}

