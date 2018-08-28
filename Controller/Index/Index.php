<?php
namespace IdealCode\TaskTracker\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;

class Index extends \IdealCode\TaskTracker\Controller\Task
{
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        /** @var \Magento\Framework\App\Request\Http $request */
        $request = $this->getRequest();

        if($request->isAjax() && $this->_formKeyValidator->validate($request)) {

            /** @var \IdealCode\TaskTracker\Block\Task\ListTask $block */
            $block = $resultPage->getLayout()->getBlock('task.list');

            /** @var \Magento\Framework\Controller\Result\Json $resultJson */
            $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

            return $resultJson->setData($block->getJsLayoutData());
        }

        return $resultPage;
    }
}
