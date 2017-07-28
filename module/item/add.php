<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25/7/2017
 * Time: 10:13 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once HELPER_PATH . '/helper.php';
require_once DB_PATH . '/item_db.php';

$name = getPOSTValue('name');
$price = getPOSTValue('price');
if (addItem($name, $price))
	die('{"fail":"0"}');
die('{"fail":"1"}');