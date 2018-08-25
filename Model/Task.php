<?php
namespace IdealCode\TaskTracker\Model;

class Task extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Task::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        return intval($this->getData('status_id'));
    }

    /**
     * @return null|string
     */
    public function getStatusName()
    {
        $statusId = $this->getStatusId();
        if($statusId > 0) {
            /** @var ResourceModel\Status $resourceStatus */
            $resourceStatus = $this->getData('resourceStatusFactory')->create();

            /** @var Status $status */
            $status = $this->getData('statusFactory')->create();

            $resourceStatus->load($status, $statusId);
            return $status->getName();
        }

        return null;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->getData('description');
    }

    /**
     * @return null|string
     */
    public function getAssignedTo()
    {
        return $this->getData('assigned_to');
    }

    /**
     * @return null|string
     */
    public function getStartTime()
    {
        return $this->getData('start_time');
    }

    /**
     * @return null|string
     */
    public function getEndTime()
    {
        return $this->getData('end_time');
    }
}
