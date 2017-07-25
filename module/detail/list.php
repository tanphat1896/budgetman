<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 24/07/2017
 * Time: 16:03
 */
if (!defined('MODULE_PATH'))
	die("Bad request");

require_once DB_PATH . '/detail_db.php';
require_once DB_PATH . '/item_db.php';

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    $currentPage = empty($_GET['p']) ? 1: (int)$_GET['p'];
    $totalRecord = getTotalDetailRecord();

    require_once LIB_PATH . '/pagination.php';
    require_once HELPER_PATH . '/url_helper.php';

    $page = getPagination($currentPage, $totalRecord, getDetailUrl('list'));
    $detailList = getDetailList($page['start'], $page['limit']);

    die (json_encode(array(
        'pagination' => $page['html'],
        'detailList' => $detailList
    )));
}

?>

<div class="container" id="detail">
	<h2>Khoản chi</h2>
	<hr>
	<div class="row text-right">
		<button class="btn btn-success" id="btn-add">
			<span class="glyphicon glyphicon-plus" ></span>
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
					<input type="date" name="search-date" class="form-control" value="<?php echo date('Y-m-d');?>">
					<div class="input-group-btn">
						<button class="btn btn-default" id="btn-search-detail">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
	</div>

	<div class="row" id="add-detail-div" style="display: none;">
		<div class="col-sm-offset-2 col-sm-6">
			<h4>Thêm mới</h4>
			<hr>
			<form id="frm-add-detail">
				<div class="form-group">
					<label>Mục chi</label>
					<div class="input-group">
                        <input type="hidden" name="detail-item-id" value="0">
                        <input type="text" required readonly name="detail-item-name" class="form-control">
                        <div class="input-group-btn">
                            <button id="btn-choose-item" class="btn btn-primary">
                                <span class="glyphicon glyphicon-list"></span>
                            </button>
                        </div>
                    </div>
                    <span id="detail-item-name-err" class="help-block" style="color: #fff; font-size: 12px;">
                        Hãy chọn mục chi
                    </span>
				</div>
				<div class="form-group">
					<label>Ngày</label>
					<input type="date" name="date-add" class="form-control" value="<?php echo date('Y-m-d');?>">
				</div>
				<div class="form-group">
					<label>Buổi</label>
					<div class="checkbox">
						<label class="checkbox-inline">
							<input type="radio" name="period" value="1" checked> Sáng
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="period" value="2"> Trưa
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="period" value="3"> Chiều
						</label>
						<label class="checkbox-inline">
							<input type="radio" name="period" value="4"> Tối
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Số lượng</label>
					<input type="number" name="amount" min="1" value="1" class="form-control">
				</div>
				<div class="form-group text-right">
					<button class="btn btn-success" type="submit" id="btn-save-detail">Thêm</button>
					<button class="btn btn-warning" id="btn-hide-detail">Xong</button>
				</div>
			</form>
		</div>
        <div class="col-sm-4" id="item-chosen-list" style="display: none;"><!--style="display: none;"-->
            <h5>
                <a href="#" id="link-refresh-chosen-list">
                    Mục chi <span class="glyphicon glyphicon-refresh"></span>
                </a>
            </h5>
            <select class="form-control select-item-list" multiple size="20">
            </select>
        </div>
	</div>
	<div class="row text-center" id="detail-list">
	</div>
</div>
