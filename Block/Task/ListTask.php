<?php
namespace IdealCode\TaskTracker\Block\Task;

class ListTask extends \Magento\Framework\View\Element\Template
{
    /** @var \IdealCode\TaskTracker\Model\ResourceModel\Task\CollectionFactory */
    protected $_collectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \IdealCode\TaskTracker\Model\ResourceModel\Task\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \IdealCode\TaskTracker\Model\ResourceModel\Task\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get data for js render
     *
     * @return array
     */
    public function getJsLayoutData()
    {
        $result = [
            'items' => [],
            'order' => $this->getOrder(),
            'direction' => $this->getDirection()
        ];

        /** @var \IdealCode\TaskTracker\Model\Task $item */
        foreach($this->getCollection() as $item) {
            $result['items'][] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'status_name' => $item->getStatusName(),
                'description' => $item->getDescription(),
                'assigned_to' => $item->getAssignedTo(),
                'start_time' => $item->getStartTime(),
                'end_time' => $item->getEndTime(),
                'url' => $this->getUrl('*/task/edit', ['id' => $item->getId()]),
            ];
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getRemoveActionUrl()
    {
        return $this->getUrl('*/task/remove');
    }

    /**
     * Get collection of tasks
     *
     * @return \IdealCode\TaskTracker\Model\ResourceModel\Task\Collection
     */
    public function getCollection()
    {
        /** @var \IdealCode\TaskTracker\Model\ResourceModel\Task\Collection $collection */
        $collection = $this->_collectionFactory->create();
        $collection->setOrder($this->getOrder(), $this->getDirection());

        return $collection;
    }

    /**
     * @return string
     */
    protected function getOrder()
    {
        $orders = [
            'id',
            'name',
            'status_id',
            'description',
            'assigned_to',
            'start_time',
            'end_time'
        ];
        $order = $this->_request->getParam('order');

        return in_array($order, $orders) ? $order : $orders[0];
    }

    /**
     * @return string
     */
    protected function getDirection()
    {
        $direction = $this->_request->getParam('direction');

        return $direction == 'desc' ? 'desc' : 'asc';
    }
}
