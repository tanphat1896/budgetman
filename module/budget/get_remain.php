<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/7/2017
 * Time: 12:42 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once DB_PATH . '/budget_db.php';
$lastBudget = getLatestBudget();
$remain = isset($lastBudget['total']) ? $lastBudget['total']: 0;
die(json_encode(array('remain' => $remain)));