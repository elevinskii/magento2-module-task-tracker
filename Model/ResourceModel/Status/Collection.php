<?php
namespace IdealCode\TaskTracker\Model\ResourceModel\Status;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \IdealCode\TaskTracker\Model\Status::class,
            \IdealCode\TaskTracker\Model\ResourceModel\Status::class
        );
    }
}
