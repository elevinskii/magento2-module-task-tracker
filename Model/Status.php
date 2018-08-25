<?php
namespace IdealCode\TaskTracker\Model;

class Status extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Status::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }
}
