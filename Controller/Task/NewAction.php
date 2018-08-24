<?php
namespace IdealCode\TaskTracker\Controller\Task;

class NewAction extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
