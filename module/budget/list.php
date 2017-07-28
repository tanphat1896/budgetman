<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/7/2017
 * Time: 12:38 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	require_once DB_PATH . '/budget_db.php';

	$currentPage = empty($_GET['p']) ? 1: (int)$_GET['p'];
	$totalRecord = getTotalBudgetRecord();

	require_once LIB_PATH . '/pagination.php';
	require_once HELPER_PATH . '/url_helper.php';

	$page = getPagination($currentPage, $totalRecord, getBudgetUrl('list'));
	$budgetList = getListBudget($page['start'], $page['limit']);

	die (json_encode(array(
		'pagination' => $page['html'],
		'start' => $page['start'],
		'budgetList' => $budgetList
	)));
}

?>

<div class="container" id="budget">
	<h2>Tài chính</h2>
	<hr>
	<div class="row text-right">
		<button class="btn btn-success" id="btn-add-budget">
			<span class="glyphicon glyphicon-plus" ></span> Thêm mới
		</button>
	</div>

	<div class="row" id="add-budget-div" style="display: none;">
		<div class="col-sm-offset-4 col-sm-4">
			<h4>Thêm mới</h4>
			<hr>
			<form id="frm-add-budget">
				<div class="form-group">
					<label>Số tiền</label>
					<input type="number" min="10000" value="100000" id="add-budget-total" class="form-control">
				</div>
				<div class="form-group text-right">
					<button class="btn btn-success" type="submit" id="btn-save-budget">Thêm</button>
					<button class="btn btn-warning" id="btn-hide-budget">Xong</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row text-center" id="budget-list">
	</div>
</div>
