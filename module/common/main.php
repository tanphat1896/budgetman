<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 15:52
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once MODULE_PATH . '/widget/header.php';

?>

<!--module detail-->
<?php require_once MODULE_PATH . '/detail/list.php'; ?>


<!--module budget-->
<div class="container" id="budget">
	<h2>Tài chính</h2>
	<hr>
	<div class="row text-center">
		<table class="table">
			<thead>
			<tr class="text-center"><th>TT</th><th>Ngày thêm</th><th>Tổng</th></tr>
			</thead>
			<tbody class="text-left">
			<tr><td>1</td><td>2</td><td>3</td> </tr>
			<tr><td>1</td><td>2</td><td>3</td> </tr>
			<tr><td>1</td><td>2</td><td>3</td> </tr>

			</tbody>
		</table>
		<ul class="pagination">
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
		</ul>
	</div>
</div>

<?php require_once MODULE_PATH . '/widget/footer.php'; ?>