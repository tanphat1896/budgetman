<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 22:50
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

function getPOSTValue($key){
	return isset($_POST[$key]) ? $_POST[$key]: false;
}

function getGETValue($key){
	return isset($_GET[$key]) ? $_GET[$key]: false;
}