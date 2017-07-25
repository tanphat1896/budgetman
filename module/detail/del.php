<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/7/2017
 * Time: 6:10 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/detail_db.php';
$id = (int)getPOSTValue('id');
if (removeDetail($id))
	die('{"fail":"0"}');
die('{"fail":"1"}');