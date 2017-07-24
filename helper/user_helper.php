<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 22:50
 */
if (!defined('MODULE_PATH'))
	die("Bad request");


require_once HELPER_PATH . '/url_helper.php';
require_once LIB_PATH . '/session.php';

function isLogged(){
	return !empty(getSession('userToken'));
}

function logout(){
	rmSession('userToken');
}

function login(){
	setSession('userToken', true);
}