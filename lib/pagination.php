<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/7/2017
 * Time: 7:37 PM
 */

if (!defined('MODULE_PATH'))
	die("Bad request");

include_once HELPER_PATH . '/url_helper.php';

// mẫu tin mỗi trang
$recordPerPage = 8;

// số nút hiển thị
$totalButton = 5;

function getPagination($currentPage, $totalRecord, $url){
	global $recordPerPage;
	global $totalButton;
	$totalPage = ceil($totalRecord/$recordPerPage);
	if ($currentPage > $totalPage)
		$currentPage = 1;
	$recordStart = ($currentPage - 1)*$recordPerPage;
	return generatePaginationData($totalPage, $recordStart, $currentPage, $url);
}

function generatePaginationData($totalPage, $start, $currentPage, $url){
	global $recordPerPage;
	global $totalButton;
	$htmlPagination = '';
	if ($totalPage > 1){
		$min = 0;
		$max = 0;
		if ($totalPage <= $totalButton){
			$min = 1;
			$max = $totalPage;
		} else {
			$middle = ceil($totalButton/2);
			$min = $currentPage - $middle + 1;
			$max = $currentPage + $middle - 1;
			if ($min < 1){
				$min = 1;
				$max = $totalButton;
			}
			if ($max > $totalPage){
				$max = $totalPage;
				$min = $totalPage - $totalButton + 1;
			}
		}
		$htmlPagination = getHtmlPagination($currentPage, $totalPage, $min, $max, $url);
	}
	return array(
		'start' => $start,
		'limit' => $recordPerPage,
		'html' => $htmlPagination
	);
}

function getHtmlPagination($currentPage, $totalPage, $min, $max, $url){
	$html = '';
	$html .= "<ul class='pagination small'>";
	if ($currentPage > 1){
		$html .= "<li><a href='$url&p=1' data-toggle='tooltip' title='Trang 1'>&laquo;</a></li>";
		$html .= "<li><a href='$url&p=" . ($currentPage-1) . "' data-toggle='tooltip' title='Trang trước'>
						&lt;</a></li>";
	}
//	else {
//		$html .= "<li class='disabled'><span>&laquo;</span></li>";
//		$html .= "<li class='disabled'><span>&lt;</span></li>";
//	}
	for ($i = $min; $i <= $max; $i++){
		if ($currentPage == $i)
			$html .= "<li class='active'><span>$i</span></li>";
		else $html .= "<li><a href='$url&p=$i'>$i</a></li>";
	}

	if ($currentPage < $totalPage){
		$html .= "<li><a href='$url&p=" . ($currentPage+1) . "' data-toggle='tooltip' title='Trang sau'>
					&gt;</a></li>";
		$html .= "<li><a href='$url&p=$totalPage' data-toggle='tooltip' title='Trang cuối'>&raquo;</a></li>";
	} else {
//		$html .= "<li class='disabled'><span>&gt;</span></li>";
//		$html .= "<li class='disabled'><span>&raquo;</span></li>";
	}
	return $html;
}