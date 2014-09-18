<?php
require_once 'function.php';
//取得元指定
$url = 'http://feeds.lifehacker.jp/rss/lifehacker/index.xml';
//xmlデータ取得:オブジェクト形式
$xml = simplexml_load_file($url);
//取得元指定
$url = 'http://photoshopvip.net/feed';
//xmlデータ取得:オブジェクト形式
$xml1 = simplexml_load_file($url);
$url = 'http://getnews.jp/feed';
//xmlデータ取得:オブジェクト形式
$xml2 = simplexml_load_file($url);

$data = $_POST;
if (isset($data['write'])){
		session_start();
		$_SESSION['user']['name'] = $data['name'];
		$_SESSION['user']['date'] = date('Y年 m月 d日 H:i:s');
		header('Location: php.php');
	}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>バナナちゃっと</title>
<link rel="stylesheet" href="php.css" media="all" />
</head>
<body>
<div class="wrap">
	<header class="clearfix">
		<h1><img src="logo.gif"  alt="" /></h1>
		<h2>ーバナナチャットー</h2>
		<p class="nosp"><img src="banana.png"  alt="" /></p>
		<div id="topform">
			<form method="post" action="index.php">
				<input type="text" name="name" required>
				<input type="submit" name="write" value="ログイン" >
			</form>
		</div>
	</header>
	<div class="clearfix">
		<article id="rss">
			<ul>
				<li>
					<h2>バナナライフハック</h2>
				</li>
				<?php foreach($xml->channel->item as $item){?>
				<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
				<?php }?>
			</ul>
			<ul>
				<li>
					<h2>バナナデザイン</h2>
				</li>
				<?php foreach($xml1->channel->item as $item){?>
				<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
				<?php }?>
			</ul>
			<ul>
				<li>
					<h2>バナナニュース</h2>
				</li>
				<?php foreach($xml2->channel->item as $item){?>
				<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
				<?php }?>
			</ul>
		</article>
		<aside id="banner">
			<a href="http://027.intp-d.info/portfolio/"><img src="lee.png" alt="" /></a>
			<a href="http://035.intp-d.info/portfolio/"><img src="tokunaga.png" alt="" /></a>
			<a href="http://037.intp-d.info/portfolio/"><img src="nozawa.png" alt="" /></a>
		</aside>
	</div>
	<footer>
		<p><a href="#top">トップに戻る</a></p>
		<address>Copyright © 2014 CSS4 All Rights Reserved.</address>
	</footer>
</div>
</body>
</html>