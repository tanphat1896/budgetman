<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 21:52
 */

define('MODULE_PATH', __DIR__ . '/module');
define('DB_PATH', __DIR__ . '/module/core/db');
define('CONF_PATH', __DIR__ . '/module/core/config');
define('LIB_PATH', __DIR__ . '/lib');
define('HELPER_PATH', __DIR__ . '/helper');
define('PUBLIC_PATH', __DIR__ . '/public');
include_once HELPER_PATH . '/user_helper.php';
if (!isLogged()){
	require_once MODULE_PATH . '/common/login.php';
} else {
	require_once HELPER_PATH . '/conf_helper.php';
	$action = empty($_GET['a']) ? 'main': $_GET['a'];
	$module = empty($_GET['m']) ? 'common': $_GET['m'];
	$path = MODULE_PATH . "/$module/$action.php";
	if (file_exists($path))
		require_once $path;
	else die("Bad request!");
}
//
//include_once DB_PATH . '/detail_db.php';
//include_once DB_PATH . '/budget_db.php';
//include_once LIB_PATH . '/pagination.php';
//include_once HELPER_PATH . '/url_helper.php';

//var_dump(addDetail(2, "2017-2-1", 2, 10));
//var_dump(addBudget(-20000, '2017-2-8'));
//var_dump(addNewBudget(220000, '2017-2-8'));