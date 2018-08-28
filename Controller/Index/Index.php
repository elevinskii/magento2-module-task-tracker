<?php
namespace IdealCode\TaskTracker\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var \Magento\Framework\Data\Form\FormKey\Validator */
    protected $_formKeyValidator;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator
    ) {
        $this->_formKeyValidator = $formKeyValidator;
        parent::__construct($context);
    }

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
