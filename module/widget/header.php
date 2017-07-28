<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 14:13
 */
if (!defined('MODULE_PATH'))
	die("Bad request");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo getBaseUrl(); ?>/public/favicon.ico">		
	<title>Budget management</title>
	<link rel="stylesheet" type="text/css" href="<?php echo getBaseUrl(); ?>/public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo getBaseUrl(); ?>/public/css/style.css">
	<style type="text/css">
		body {
			/*min-height: 1000px;*/
		}

		.fill {
			height: 50px;
			width: auto;
		}

		.navbar, .navbar a{
			background-color: #337ab7;
			color: #fff !important;
		}

		li.active a{
			color: #337ab7 !important;
			background-color: #fff !important;
		}

		/*.container{*/
			/*padding: 50px 25px;*/
		/*}*/

		.navbar .container{
			padding: inherit;
		}

		h2{
			color:  #337ab7;
		}

		.go-top {
			padding: 7px 10px;
			background-color: #337ab7;
			color: #fff;
			position: fixed;
			bottom: 10px;
			right: 10px;
		}

		.jumbotron, .jumbotron h2{
			background-color: #337ab7;
			color: #fff;
		}

		footer{
			height: 100px;
			background-color: #337ab7;
			line-height: 100px;
		}

		footer a{
			color: #fff !important;
		}

		.navbar-toggle{
			border: none;
		}

		.icon-bar{
			background-color: #fff !important;
		}


	</style>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="#home" class="navbar-brand">BudgetMan</a>
			<button class="navbar-toggle" data-toggle="collapse" href="#menu">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="menu" class="collapse navbar-collapse navbar-right">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#home">Home</a></li>
				<li><a href="#detail">Khoản chi</a></li>
				<li><a href="#item">Mục chi</a></li>
				<li><a href="#budget">Tài chính</a></li>
				<li><a href="#" id="logout">
						<span class="glyphicon glyphicon-log-out"></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="fill" id="home"></div>

<div class="jumbotron text-center">
	<h2>Budget Management</h2>
	<p>Blabla</p>
</div>
