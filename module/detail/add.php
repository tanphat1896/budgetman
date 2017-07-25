<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/7/2017
 * Time: 6:36 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/detail_db.php';

$itemId = (int)getPOSTValue('itemId');
$day = (int)getPOSTValue('day');
$mon = (int)getPOSTValue('mon');
$year = (int)getPOSTValue('year');
$date = "$year-$mon-$day";
$period = (int)getPOSTValue('period');
$amount = (int)getPOSTValue('amount');

if (addDetail($itemId, $date, $period, $amount))
	die('{"fail": "0"}');
die('{"fail": "1"}');