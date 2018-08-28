<?php
namespace IdealCode\TaskTracker\Controller;

abstract class Task extends \Magento\Framework\App\Action\Action
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
}
