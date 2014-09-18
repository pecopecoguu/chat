<?php
function h($var) {
	return nl2br(htmlspecialchars($var, ENT_QUOTES, 'UTF-8'));
}
function n($v) {
	return nl2br($v);
}
function v($text){
	return var_dump($text);
}
/* $strはHTMLソースです */
function myStrlen($str){

	// HTMLタグを削除
	$str = strip_tags($str);
	// 改行を削除
	$str = preg_replace("/(\015\012)|(\015)|(\012)/", "", $str);
	// 連続する半角スペースを半角スペース１としてカウント
	$str = preg_replace('!\s+!', " ", $str);
	// HTML特殊文字を半角1文字としてカウント
	$str = preg_replace("/&[a-zA-Z]{1,5};/", " ", $str);
	// Unicode10進文字を半角1文字としてカウント
	$str = preg_replace("/&#[0-9]{1,5};/", " ", $str);
	// PHPマルチバイト対応
	if( function_exists('mb_strlen') ){
		$result = mb_strlen($str);
	}else{
		$result = strlen($str);
	}

	return $result;
}
// function e($str, $charset = 'UTF-8') {
// 	return htmlspecialchars($str, ENT_QUOTES, $charset);
// }

// function format($datetime, $format = 'yyyy/MM/dd') {
// 	$ts = strtotime($datetime);
// 	print(date($format, $ts));
//}
