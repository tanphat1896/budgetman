<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/7/2017
 * Time: 7:22 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	require_once DB_PATH . '/item_db.php';

	$currentPage = empty($_GET['p']) ? 1: (int)$_GET['p'];

	if ($currentPage == -1){
	    die(json_encode(getItemList(0)));
    }
	$totalRecord = getTotalItemRecord();

	require_once LIB_PATH . '/pagination.php';
	require_once HELPER_PATH . '/url_helper.php';

	$page = getPagination($currentPage, $totalRecord, getItemUrl('list'));
	$itemList = getItemList($page['start'], $page['limit']);

	die (json_encode(array(
		'pagination' => $page['html'],
		'start' => $page['start'],
		'itemList' => $itemList
	)));
}

?>

<div class="container" id="item">
	<h2>Mục chi</h2>
	<hr>
	<div class="row text-right">
		<button class="btn btn-success" id="btn-add-item">
			<span class="glyphicon glyphicon-plus" ></span> Thêm mục chi
		</button>
	</div>

	<div class="row" id="add-item-div" style="display: none;">
		<div class="col-sm-offset-4 col-sm-4">
			<h4>Thêm mới</h4>
			<hr>
			<form id="frm-add-item">
				<div class="form-group">
					<label>Tên mục chi</label>
					<input type="text" id="add-item-name" class="form-control">
				</div>
				<div class="form-group">
					<label>Giá</label>
					<input type="number" id="add-item-price" class="form-control" min="500" value="1000">
				</div>
				<div class="form-group text-right">
					<button class="btn btn-success" type="submit" id="btn-save-item">Thêm</button>
					<button class="btn btn-warning" id="btn-hide-item">Xong</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row text-center" id="item-list">
	</div>
</div>
