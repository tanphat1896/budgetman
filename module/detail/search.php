<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/7/2017
 * Time: 12:00 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/detail_db.php';
$date = getGETValue('d');
if (empty($date)){
	$date = date('Y-m-d');
}

$currentPage = empty($_GET['p']) ? 1: (int)$_GET['p'];
$totalRecord = getTotalDetailRecord($date);

require_once LIB_PATH . '/pagination.php';
require_once HELPER_PATH . '/url_helper.php';

$page = getPagination($currentPage, $totalRecord, getDetailUrl('search&d=' . $date));
$detailList = getDetailByDay($date, $page['start'], $page['limit']);

die (json_encode(array(
	'pagination' => $page['html'],
	'detailList' => $detailList
)));