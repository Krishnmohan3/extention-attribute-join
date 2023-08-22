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

namespace Webkul\ExtentionAttribute\Api;
 
interface OrderManagementInterface {

	/**
	 * Get order List
	 * 
	 * @return array
	 */
	public function getList();
}