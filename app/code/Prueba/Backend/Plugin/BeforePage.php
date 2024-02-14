<?php

namespace Prueba\Backend\Plugin;

use Magento\Cms\Model\Page;

class BeforePage
{
    public function beforeSetContect(Page $subject, $content)
    {
        return $subject->setContect('<!--'.$content.'-->' );
    }
}