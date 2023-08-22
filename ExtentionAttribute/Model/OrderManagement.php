<?php
/**
 * Webkul Software.
 *
 * @category  Webkul
 * @package   Webkul_ExtentionAttribute
 * @author    Webkul Software Private Limited
 * @copyright Webkul Software Private Limited (https://webkul.com)
 * @license   https://store.webkul.com/license.html
 */

namespace Webkul\ExtentionAttribute\Model;
 
class OrderManagement {
	
	/**
	 * Construct function
	 *
	 * @param \Magento\Sales\Api\OrderRepositoryInterface $repository
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 * @param \Magento\Framework\Api\Search\FilterGroup $filterGroup
	 * @param \Magento\Framework\Api\Filter $filter
	 */
    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $repository,
        \Magento\Framework\Api\SearchCriteriaInterface  $searchCriteria,
        \Magento\Framework\Api\Search\FilterGroup $filterGroup,
		\Magento\Framework\Api\Filter $filter
    ) {
        $this->repository = $repository;
        $this->searchCriteria = $searchCriteria;
        $this->filterGroup = $filterGroup;
		$this->filter = $filter;
    }

	/**
	 * @inheritdoc
	 */
	public function getList()
	{
		$returnArr = [];
		$repository = $this->repository;
		$searchCriteria = $this->searchCriteria;
		$filterGroup = $this->filterGroup;
		$filter = $this->filter;
		$filter->setField('entity_id');
		$filter->setValue('10');
		$filter->setConditionType('eq'); 
		$filterGroup->setFilters([$filter]);
		$searchCriteria->setFilterGroups([$filterGroup]);
		$orderList = $repository->getList($searchCriteria);
		foreach ($orderList->getItems() as $order) {
           $extensionAttribute = $order->getExtensionAttributes();
		   $returnArr = [
			    $extensionAttribute->getCustomCol1(),
			    $extensionAttribute->getCustomCol2()
		   ];
        }
		return $returnArr;
	}
}