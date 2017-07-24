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
