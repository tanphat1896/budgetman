<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 22:50
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

function redirect($url){
//	echo "<script>window.location.reload();</script>";
	header("Location: $url");
	die();
}

function getDetailUrl($action){
	require_once HELPER_PATH . '/conf_helper.php';
	return getBaseUrl() . "?m=detail&a=$action";
}

function getItemUrl($action){
	require_once HELPER_PATH . '/conf_helper.php';
	return getBaseUrl() . "?m=item&a=$action";
}

function getBudgetUrl($action){
	require_once HELPER_PATH . '/conf_helper.php';
	return getBaseUrl() . "?m=budget&a=$action";
}
