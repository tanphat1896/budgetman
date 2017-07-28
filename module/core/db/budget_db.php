<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 13:29
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once DB_PATH . '/DataProvider.php';
$dataProvider = DataProvider::getInstance();

function getTotalBudgetRecord(){
	global $dataProvider;
	$sql = "select count(*) as total from budget";
	return $dataProvider->getRow($sql)['total'];
}

function getLatestBudget(){
	global $dataProvider;
	$sql = "select * from budget order by id desc";
	return $dataProvider->getRow($sql);
}

function getListBudget($recordStart, $limit = 0){
	global $dataProvider;
	$sql = "select * from budget order by id desc";
	if (!empty($limit))
		$sql .= " limit $recordStart, $limit";
	return $dataProvider->getAllRow($sql);
}

function deductBudget($totalDeduction, $date, $note = ''){
	$lastBudget = getLatestBudget();
	$remain = isset($lastBudget['total']) ? $lastBudget['total']: 0;
	return addBudget($remain - $totalDeduction, $date, 0, $note);
}

function raiseBudget($total, $date, $note = ''){
	$lastBudget = getLatestBudget();
	$remain = isset($lastBudget['total']) ? $lastBudget['total']: 0;
	return addBudget($remain + $total, $date, 0, $note);
}

function addNewBudget($total, $date){
	$remain = isset(getLatestBudget()['total']) ? getLatestBudget()['total']: 0;
	if ($remain < 0){
		addBudget($total, $date, 1, 'Thêm mới');
		return addBudget($total + $remain, $date, 0, 'Trừ khoản tiền âm lần trước');
	}
	return addBudget($total, $date, 1, 'Thêm mới');
}

function addBudget($total, $date, $state = 0, $note = ''){
	global $dataProvider;
	$sql = "insert into budget(total, date_add, state, note) values($total, '$date', $state, '$note')";
	return $dataProvider->exec($sql);
}

function removeBudget($id){
	global $dataProvider;
	$sql = "delete from budget where id = $id";
	return $dataProvider->exec($sql);
}