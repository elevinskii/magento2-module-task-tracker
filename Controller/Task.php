<?php
namespace IdealCode\TaskTracker\Controller;

abstract class Task extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\Data\Form\FormKey\Validator */
    protected $_formKeyValidator;

    /** @var \IdealCode\TaskTracker\Model\TaskFactory */
    protected $_modelFactory;

    /** @var \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory */
    protected $_resourceModelFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     * @param \IdealCode\TaskTracker\Model\TaskFactory $modelFactory
     * @param \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModelFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator,
        \IdealCode\TaskTracker\Model\TaskFactory $modelFactory,
        \IdealCode\TaskTracker\Model\ResourceModel\TaskFactory $resourceModelFactory
    ) {
        $this->_formKeyValidator = $formKeyValidator;
        $this->_modelFactory = $modelFactory;
        $this->_resourceModelFactory = $resourceModelFactory;
        parent::__construct($context);
    }
}
