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

<!--module item-->
<?php require_once MODULE_PATH . '/item/list.php'; ?>


<!--module budget-->
<?php require_once MODULE_PATH . '/budget/list.php'; ?>

<?php require_once MODULE_PATH . '/widget/footer.php'; ?>