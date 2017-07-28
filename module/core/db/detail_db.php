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

function getTotalDetailRecord($date = ''){
	global $dataProvider;
	$sql = "select count(*) as total from detail";
	if (!empty($date))
		$sql .= " where date_add = '$date'";
	return $dataProvider->getRow($sql)['total'];
}

function getDetail($id){
	global $dataProvider;
	$sql = "select * from detail where id = $id";
	return $dataProvider->getRow($sql);
}

function getDetailByDay($date, $recordStart, $limit){
	global $dataProvider;
	$date = $dataProvider->escapeString($date);
	$sql = "select d.id as id, i.name as name, i.price as price, 
				d.period as period, d.date_add as date, d.amount as amount, d.cost as cost 
				from detail d inner join item i on i.id = d.it_id 
				where date_add = '$date' 
				order by d.id desc limit $recordStart, $limit";
	return $dataProvider->getAllRow($sql);
}

function getDetailList($recordStart, $limit){
	global $dataProvider;
	$sql = "select d.id as id, i.name as name, i.price as price, 
				d.period as period, d.date_add as date, d.amount as amount, d.cost as cost 
				from detail d inner join item i on i.id = d.it_id order by d.id desc 
				limit $recordStart, $limit";
	return $dataProvider->getAllRow($sql);
}

function removeDetail($id){
	global $dataProvider;
	require_once DB_PATH . '/budget_db.php';
	$detail = getDetail($id);
	$totalCost = isset($detail['cost']) ? $detail['cost']: 0;
	if (raiseBudget($totalCost, date('Y-m-d'), "Hoàn trả xóa khoản chi")){
		$sql = "delete from detail where id = $id";
		return $dataProvider->exec($sql);
	}
	return false;
}

function addDetail($itemId, $date, $period, $amount){
	global $dataProvider;
	require_once DB_PATH . '/item_db.php';
	require_once DB_PATH . '/budget_db.php';
	$item = getItem($itemId);
	$itemPrice = isset($item['price']) ? $item['price']: 0;
	$totalCost = $itemPrice*$amount;
	// đáng lẽ phải dùng transaction
	if (deductBudget($totalCost, $date, "Trừ khoản chi {$item['name']}")){
		$sql = "insert into detail(it_id, period, date_add, amount, cost) 
				VALUE ($itemId, $period, '$date', $amount, $totalCost)";
		return $dataProvider->exec($sql);
	}
	return false;
}