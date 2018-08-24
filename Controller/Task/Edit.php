<?php
namespace IdealCode\TaskTracker\Controller\Task;

class Edit extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        return $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_PAGE
        );
    }
}
