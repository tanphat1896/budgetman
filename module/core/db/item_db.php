<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/7/2017
 * Time: 6:51 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once DB_PATH . '/DataProvider.php';
$dataProvider = DataProvider::getInstance();

function getTotalItemRecord(){
	global $dataProvider;
	$sql = "select count(*) as total from item";
	return $dataProvider->getRow($sql)['total'];
}

function getItem($id){
	global $dataProvider;
	$id = (int)$id;
	$sql = "select * from item where id = $id";
	return $dataProvider->getRow($sql);
}

function getItemList($recordStart, $limit = 0){
	global $dataProvider;
	$sql = "select * from item";
	if (!empty($limit))
		$sql .= " limit $recordStart, $limit";
	return $dataProvider->getAllRow($sql);
}

function removeItem($id){
	global $dataProvider;
	$sql = "delete from item where id = $id";
	return $dataProvider->exec($sql);
}

function addItem($name, $price){
	global $dataProvider;
	$name = $dataProvider->escapeString($name);
	$price = (int)$price;
	$sql = "insert into item(name, price) value('$name', $price)";
	return $dataProvider->exec($sql);
}