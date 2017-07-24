<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 18/07/2017
 * Time: 22:51
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

$config = include_once CONF_PATH . '/config.php';

function getBaseUrl(){
	global $config;
	return isset($config['baseUrl']) ? $config['baseUrl']: 'http://budgetman.dev';
}