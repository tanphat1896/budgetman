<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/7/2017
 * Time: 9:55 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/item_db.php';

$id = (int)getPOSTValue('id');
if (removeItem($id))
	die('{"fail":"0"}');
die('{"fail":"1", "msg": "Không được xóa! Các khoản chi có chứa mục chi này!!!"}');