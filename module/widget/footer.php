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

<footer class="container-fluid text-center" id="about">
	<a href="#home">Nguyễn Tấn Phát</a>
</footer>

<!-- other -->
<a href="#home" class="go-top" title="Bay lên top" data-placement="auto" data-toggle="tooltip">
	<span class="glyphicon glyphicon-chevron-up"></span>
</a>
<?php echo "<script>var baseUrl = '" . getBaseUrl() . "';</script>" ?>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/bootstrap/js/jquery-3.2.1.min.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/bootstrap/js/bootstrap.min.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/animation.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/user_state.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/process_item.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/process_budget.js"></script>
<script lang="javascript" src="<?php echo getBaseUrl(); ?>/public/js/process_detail.js"></script>

</body>

</html>
