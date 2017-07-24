<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 16:03
 */
if (!defined('MODULE_PATH'))
	die("Bad request");
?>

<div class="container" id="detail">
	<h2>Khoản chi</h2>
	<hr>
	<div class="row text-right">
		<button class="btn btn-success">
			<span class="glyphicon glyphicon-plus" id="btn-add"></span>
		</button>
		<button class="btn btn-primary" id="btn-search" >
			<span class="glyphicon glyphicon-search"></span>
		</button>
	</div>
	<div class="row" id="search-div" style="display: none;">
		<div class="col-sm-offset-4 col-sm-4">
			<div class="form-group">
				<label>Tìm kiếm</label>
				<div class="input-group">
					<input type="date" class="form-control">
					<div class="input-group-btn">
						<button class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
	</div>

	<div class="row" id="add-div" style="display: none;">
		<div class="col-sm-offset-4 col-sm-4">
			<h4>Thêm mới</h4>
			<hr>
			<form id="frm-add">
				<div class="form-group">
					<label>Khoản chi</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Khoản chi</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Khoản chi</label>
					<input type="text" class="form-control">
				</div>
			</form>
		</div>
	</div>
	<div class="row text-center">
		<table class="table">
			<thead>
			<tr class="text-center"><th>TT</th><th>Tên</th><th>Buổi</th><th>Ngày</th><th>Tổng</th><th></th></tr>
			</thead>
			<tbody class="text-left">
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>
				<td>
					<button class="btn btn-danger btn-sm">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
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

<!--	<div class="modal" id="add-div">-->
<!--		<div class="modal-dialog">-->
<!--			<div class="modal-content">-->
<!--				<div class="modal-header">-->
<!--					<span class="modal-title">Thêm mới</span>-->
<!--				</div>-->
<!--				<div class="modal-body">-->
<!--					<form id="frm-add">-->
<!--						<div class="form-group">-->
<!--							<label>Khoản chi</label>-->
<!--							<input type="text" class="form-control">-->
<!--						</div>-->
<!--						<div class="form-group">-->
<!--							<label>Khoản chi</label>-->
<!--							<input type="text" class="form-control">-->
<!--						</div>-->
<!--						<div class="form-group">-->
<!--							<label>Khoản chi</label>-->
<!--							<input type="text" class="form-control">-->
<!--						</div>-->
<!--					</form>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
</div>
