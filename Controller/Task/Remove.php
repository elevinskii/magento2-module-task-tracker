<?php
namespace IdealCode\TaskTracker\Controller\Task;

class Remove extends \IdealCode\TaskTracker\Controller\Task
{
    public function execute()
    {
        /** @var \Magento\Framework\App\Request\Http $request */
        $request = $this->_request;
        $id = intval($request->getParam('id'));

        if(($id > 0) && $this->_formKeyValidator->validate($request)) {

            /** @var \IdealCode\TaskTracker\Model\Task $model */
            $model = $this->_modelFactory->create();

            /** @var \IdealCode\TaskTracker\Model\ResourceModel\Task $resourceModel */
            $resourceModel = $this->_resourceModelFactory->create();

            $resourceModel->load($model, $id)->delete($model);

            if($request->isAjax()) {

                /** @var \Magento\Framework\Controller\Result\Json $resultJson */
                $resultJson = $this->resultFactory->create(
                    \Magento\Framework\Controller\ResultFactory::TYPE_JSON
                );

                return $resultJson->setData(['success' => true]);
            }
        }

        return $this->_redirect('*');
    }
}
