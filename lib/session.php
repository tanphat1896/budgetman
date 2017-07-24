<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 22:44
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

session_start();

function setSession($key, $value){
	$_SESSION[$key] = $value;
}

function getSession($key){
	return isset($_SESSION[$key]) ? $_SESSION[$key]: false;
}

function rmSession($key){
	unset($_SESSION[$key]);
}