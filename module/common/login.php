<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 13:50
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

include_once HELPER_PATH . '/conf_helper.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
	&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	require_once DB_PATH . '/user_db.php';
	require_once HELPER_PATH . '/helper.php';
	require_once HELPER_PATH . '/url_helper.php';
	require_once HELPER_PATH . '/user_helper.php';
	$password = getPOSTValue('password');
	if (isValidPassword($password)){
		login();
		die('{"fail": "0"}');
	} else die ('{"fail": "1"}');
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<style>
        
        body{
            background-color: #337ab7;
        }
        
		.container{
			padding: 20px;
			font-family: sans-serif;
			font-size: 16px;
			text-align: center;
		}
		.login-div{
			/*padding-top: 100px;*/
			margin: auto;
			width: 500px;
			height: 100px;
			text-align: center;
			transition: box-shadow 0.5s;
		}

        .banner{
            background-color: #337ab7;
            font-family: sans-serif;
            margin-top: 150px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

		input{
			width: 300px;
			border-radius: 15px;
			padding: 7px 15px;
			border: 1px solid lightgray;
			font-size: 14px;
			transition: box-shadow 0.5s;
		}

		input:focus{
			outline-width: 0;
			box-shadow: 0 0 5px #fff;
		}

		.btn{
			border-radius: 15px;
			padding: 7px 20px;
			background-color: #337AB7;
			border: 1px solid #fff;
			box-shadow: 0 0 3px #fff;
			color: #fff;
			font-weight: bold;
		}

		.btn:hover{
			cursor: hand !important;
            background-color: #fff;
            color: #337ab7;
		}

		.form-control{
			display: inline;
			margin-bottom: 10px;
		}
		@media only screen and (max-width: 480px) {
			.login-div{
				width: 100%;
			}

			input{
				width: 100%;
			}
		}

		#loading{
			font-weight: bold;
			color: #337ab7;
		}
	</style>
</head>
<body>
<div class="banner">
    <h2>Đăng nhập để bắt đầu</h2>
</div>
<div class="container">
	<div class="login-div">
		<form method="post" id="frm-login">
			<input type="password" class="form-control" id="password" required
				placeholder="Nhập mật khẩu">
			<button type="submit" name="1" class="btn">Tiếp tục</button>
		</form>
	</div>
	<div id="loading" style="display: none;">Đang tải...</div>
</div>

<?php
echo "<script>var baseUrl = '" . getBaseUrl() . "'</script>";
?>

<script src="<?php echo getBaseUrl(); ?>/public/bootstrap/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo getBaseUrl(); ?>/public/js/user_state.js"></script>
</body>
</html>

