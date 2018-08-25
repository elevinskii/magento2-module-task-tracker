<?php
namespace IdealCode\TaskTracker\Model\ResourceModel\Task;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \IdealCode\TaskTracker\Model\Task::class,
            \IdealCode\TaskTracker\Model\ResourceModel\Task::class
        );
    }
}
