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

$id = (int)getPOSTValue('id');
if (removeBudget($id))
	die('{"fail":"0"}');
die('{"fail":"1", "msg": "Lỗi xóa khoản tiền!!!"}');