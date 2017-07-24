<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/7/2017
 * Time: 6:39 PM
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

class DataProvider {
	private static $dtp = null;
	private $con;

	private function __construct() {
		$config = include_once MODULE_PATH . '/core/config/config.php';
		$host = empty($config['dbhost']) ? 'localhost': $config['dbhost'];
		$user = empty($config['dbuser']) ? 'root': $config['dbuser'];
		$pass = empty($config['dbpass']) ? '': $config['dbpass'];
		$dbname = empty($config['dbname']) ? 'budgetman': $config['dbname'];
		$this->con = new mysqli($host, $user, $pass, $dbname)
			or die('Invalid data provider');
		$this->con->query('set names utf8');
	}

	public static function getInstance(){
		if (empty(self::$dtp)){
			self::$dtp = new DataProvider();
		}
		return self::$dtp;
	}

	public function escapeString($str){
		return $this->con->real_escape_string($str);
	}

	public function getRow($sql){
		$rs = $this->con->query($sql);
		$row = array();
		if ($rs->num_rows > 0)
			$row = $rs->fetch_assoc();
		return $row;
	}

	public function getAllRow($sql){
		$rs = $this->con->query($sql);
		$list = array();
		while ($row = $rs->fetch_assoc())
			$list[] = $row;
		return $list;
	}

	/**
	 * Thực hiện câu update, insert delete
	 * @param $sql
	 * @return bool|mysqli_result
	 */
	public function exec($sql){
		return $this->con->query($sql);
	}
}