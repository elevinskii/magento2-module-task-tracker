<?php
namespace IdealCode\TaskTracker\Controller\Task;

class Edit extends \IdealCode\TaskTracker\Controller\Task
{
    /** @var \Magento\Framework\Registry */
    protected $_coreRegistry;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     * @param \IdealCode\TaskTracker\Model\TaskFactory $modelFactory
     * @param \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModelFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \IdealCode\TaskTracker\Model\TaskFactory $modelFactory,
        \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModelFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $formKeyValidator, $modelFactory, $resourceModelFactory);
    }

    public function execute()
    {
        /** @var \IdealCode\TaskTracker\Model\ResourceModel\Task $resourceModel */
        $resourceModel = $this->_resourceModelFactory->create();

        /** @var \IdealCode\TaskTracker\Model\Task $model */
        $model = $this->_modelFactory->create();

        /** @var \Magento\Framework\App\Request\Http $request */
        $request = $this->_request;
        $id = intval($request->getParam('id'));

        if($id > 0) {
            $resourceModel->load($model, $id);
            if(!$model->getId()) {
                return $this->_redirect('*');
            }
        }

        if(($request->getParam('action') == 'save') && $this->_formKeyValidator->validate($request)) {
            $newTask = !$model->getId();
            $model->setData($request->getParams());

            try {
                $resourceModel->save($model);
            } catch(\Exception $e) {
                $error = $e->getMessage();
            }

            if($request->isAjax()) {

                /** @var \Magento\Framework\Controller\Result\Json $resultJson */
                $resultJson = $this->resultFactory->create(
                    \Magento\Framework\Controller\ResultFactory::TYPE_JSON
                );

                return $resultJson->setData([
                    'success' => !isset($error),
                    'message' => isset($error) ? $error : __('Task successfully saved'),
                    'redirect' => $newTask && !isset($error) ? $this->_url->getUrl('*') : ''
                ]);
            }

            if($newTask && !isset($error)) {
                return $this->_redirect('*');
            }
        }

        $this->_coreRegistry->register('task', $model);

        return $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_PAGE
        );
    }
}
