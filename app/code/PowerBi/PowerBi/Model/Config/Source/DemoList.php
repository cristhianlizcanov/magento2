<?php
namespace PowerBi\PowerBi\Model\Config\Source;



// class DemoList implements \Magento\Framework\Option\ArrayInterface
// {
//     /**
//      * 
//      * @return array
//      */
//     public function toOptionArray()
//     {
//         return [['value'=>1,'label' => __('Option 1')], ['value'=>2,'label' => __('Option 2')]];
//     }
// }

class DemoList implements \Magento\Framework\Data\OptionSourceInterface
{

    protected $_demoCollectionFactory;
    public function __construct(
        \PowerBi\PowerBi\Model\ResourceModel\Demo\CollectionFactory $collectionFactory,
    ) {
        $this->_demoCollectionFactory = $collectionFactory;
    }

    public function to_key_value(array $colletion)
    {
        $keys = [];
        $values = [];

        foreach ($colletion as $value) {
            array_push($keys, $value['entity_id']);
            array_push($values, $value['title']);

        }

        return array_combine($keys, $values);
    }

    public function toOptionArray()
    {
        $collection = $this->_demoCollectionFactory->create()
        ->addFieldToSelect('entity_id', 'value')
        ->addFieldToSelect('title', 'label')
        ->load()->toArray();

        return $collection['items'];
    }
}