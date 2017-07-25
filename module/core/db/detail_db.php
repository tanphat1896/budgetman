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

function getTotalDetailRecord(){
	global $dataProvider;
	$sql = "select count(*) as total from detail";
	return $dataProvider->getRow($sql)['total'];
}

function getDetailList($recordStart, $limit){
	global $dataProvider;
	$sql = "select d.id as id, i.name as name, i.price as price, 
				d.period as period, d.date_add as date, d.amount as amount 
				from detail d inner join item i on i.id = d.it_id order by d.id desc 
				limit $recordStart, $limit";
	return $dataProvider->getAllRow($sql);
}

function removeDetail($id){
	global $dataProvider;
	$sql = "delete from detail where id = $id";
	return $dataProvider->exec($sql);
}

function addDetail($itemId, $date, $period, $amount){
	global $dataProvider;
	$itemId = (int)$itemId;
	$period = (int)$period;
	$amount = (int)$amount;
	$sql = "insert into detail(it_id, period, date_add, amount) VALUE ($itemId, $period, '$date', $amount)";
	return $dataProvider->exec($sql);
}