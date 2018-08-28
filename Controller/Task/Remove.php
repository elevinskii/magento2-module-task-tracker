<?php
namespace IdealCode\TaskTracker\Controller\Task;

class Remove extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\Data\Form\FormKey\Validator */
    protected $_formKeyValidator;

    /** @var \IdealCode\TaskTracker\Model\TaskFactory */
    protected $_model;

    /** @var \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory */
    protected $_resourceModel;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     * @param \IdealCode\TaskTracker\Model\TaskFactory $model
     * @param \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModel
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \IdealCode\TaskTracker\Model\TaskFactory $model,
        \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModel
    ) {
        $this->_formKeyValidator = $formKeyValidator;
        $this->_model = $model;
        $this->_resourceModel = $resourceModel;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Framework\App\Request\Http $request */
        $request = $this->_request;
        $id = intval($request->getParam('id'));

        if(($id > 0) && $this->_formKeyValidator->validate($request)) {

            /** @var \IdealCode\TaskTracker\Model\Task $model */
            $model = $this->_model->create();

            /** @var \IdealCode\TaskTracker\Model\ResourceModel\Task $resourceModel */
            $resourceModel = $this->_resourceModel->create();

            $resourceModel->load($model, $id)->delete($model);

            if($request->isAjax()) {

                /** @var \Magento\Framework\Controller\Result\Json $resultJson */
                $resultJson = $this->resultFactory->create(
                    \Magento\Framework\Controller\ResultFactory::TYPE_JSON
                );

                return $resultJson->setData(['success' => true]);
            }
        }

        $this->_redirect('*');
    }
}
