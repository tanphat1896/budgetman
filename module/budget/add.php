<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/7/2017
 * Time: 12:39 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/budget_db.php';

$total = getPOSTValue('total');
if (addNewBudget($total, date('Y-m-d')))
	die('{"fail":"0"}');
die('{"fail":"1"}');