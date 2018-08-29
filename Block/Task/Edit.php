<?php
namespace IdealCode\TaskTracker\Block\Task;

class Edit extends \Magento\Framework\View\Element\Template
{
    /** @var \Magento\Framework\Registry */
    protected $_coreRegistry;

    /** @var \IdealCode\TaskTracker\Model\ResourceModel\Status\CollectionFactory */
    protected $_statusCollectionFactory;

    /** @var \Magento\Framework\Data\Form\FormKey */
    protected $_formKey;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \IdealCode\TaskTracker\Model\ResourceModel\Status\CollectionFactory $statusCollectionFactory
     * @param \Magento\Framework\Data\Form\FormKey $formKey
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \IdealCode\TaskTracker\Model\ResourceModel\Status\CollectionFactory $statusCollectionFactory,
        \Magento\Framework\Data\Form\FormKey $formKey,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_statusCollectionFactory = $statusCollectionFactory;
        $this->_formKey = $formKey;
        parent::__construct($context, $data);
    }

    /**
     * Get task model
     *
     * @return \IdealCode\TaskTracker\Model\Task
     */
    public function getTask()
    {
        return $this->_coreRegistry->registry('task');
    }

    /**
     * @return \IdealCode\TaskTracker\Model\ResourceModel\Status\Collection
     */
    public function getStatusCollection()
    {
        /** @var \IdealCode\TaskTracker\Model\ResourceModel\Status\Collection $statusCollection */
        $statusCollection = $this->_statusCollectionFactory->create();
        return $statusCollection;
    }

    /**
     * @return string
     */
    public function getFormKey()
    {
        return $this->_formKey->getFormKey();
    }

    protected function _prepareLayout()
    {
        $task = $this->getTask();
        $this->pageConfig->getTitle()->set(
            __($task->getId() ? 'Edit Task' : 'New Task')
        );

        return parent::_prepareLayout();
    }
}
