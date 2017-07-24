<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 13:29
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

require_once DB_PATH .'/DataProvider.php';
$dataProvider = DataProvider::getInstance();

function getPassword(){
	global $dataProvider;
	$config = include_once CONF_PATH . '/config.php';
	$username = empty($config['admin']) ? 'tanphat': $config['admin'];
	$sql = "select password, salt from user where username = '$username'";
	return $dataProvider->getRow($sql);
}

function isValidPassword($inputPass){
	$userPass = getPassword();
	if (empty($userPass))
		return false;
	$encyptedPass = md5($inputPass . $userPass['salt']);
	return $encyptedPass === $userPass['password'];
}