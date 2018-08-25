<?php
namespace IdealCode\TaskTracker\Model\ResourceModel;

class Status extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('tasktracker_task_status', 'id');
    }
}
