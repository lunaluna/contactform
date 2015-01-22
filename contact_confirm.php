<?php
session_start();
if ( $_SESSION['full_name'] == "" ) {
	header( 'Location: ./index.php' );
	exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="keywords" content="">
<meta name="description" content="">

<link rel="stylesheet" href="./style.css" media="screen">

<title>お問い合わせ確認画面 | 問い合わせフォームサンプル</title>
</head>
<body class="contact">
	<div class="wrapper">
		<div class="header">
			<h1 class="page_title">問い合わせフォームサンプル</h1>
			<div class="header_area clear-fix">
				<h2 class="header_logo"><a href="./index.php">問い合わせフォームサンプル</a></h2>
			</div>
		</div>
		<ul class="breadclumb">
			<li><a href="./index.php">TOP</a></li>
			<li>お問い合わせ確認画面</li>
		</ul>
		<div class="mainarea">
			<div class="section contents_contact">
				<div class="contact_info">
					<p><strong class="red">まだお問い合わせは完了していません。</strong>下記フォームの内容をご確認ください。<br />よろしければ「入力内容を送信する」ボタンを、<br />内容を修正する場合は「入力ページへ戻る」ボタンを押してください。</p>
				</div>
				<div class="area_contactform">
					<h1 class="title_contactformtext">お問い合わせフォーム</h1>
					<form method="post" action="./contact_formmail.php" name="contact_formmail" class="contact_formmail">
						<div class="form_table form_confirm">
							<dl>
								<dt>お問い合わせ項目</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['subject'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>セレクトボックス</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['selectbox'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>チェックボックス</dt>
								<dd>
									<?php
										if ( isset( $_SESSION['checkbox'] ) ) {
											for ( $i = 0; $i < count( $_SESSION['checkbox'] ); $i++ ) {
												if ( $i == ( ( count( $_SESSION['checkbox'] ) ) - 1 ) ) {
													echo htmlspecialchars( $_SESSION['checkbox'][$i], ENT_QUOTES, "UTF-8" );
												} else {
													echo htmlspecialchars( $_SESSION['checkbox'][$i], ENT_QUOTES, "UTF-8" ) ."、 ";
												}
											}
										}
									?>
								</dd>
							</dl>
							<dl>
								<dt>御社名</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['company'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>お名前</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['full_name'], ENT_QUOTES, "UTF-8" ); ?> 様</dd>
							</dl>
							<dl>
								<dt>ご住所</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['pref'], ENT_QUOTES, "UTF-8" ); echo htmlspecialchars( $_SESSION['address'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>お電話番号</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['tel'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>FAX</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['fax'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>メールアドレス</dt>
								<dd><?php echo htmlspecialchars( $_SESSION['mail'], ENT_QUOTES, "UTF-8" ); ?></dd>
							</dl>
							<dl>
								<dt>お問い合わせ内容</dt>
								<dd><?php echo nl2br( htmlspecialchars( $_SESSION['detail'], ENT_QUOTES, "UTF-8" ) ); ?></dd>
							</dl>
						</div>
						<div id="btn_submitarea" class="clear-fix">
							<div id="contact_back">
								<a href="#" onclick="javascript:window.history.back(-1);return false;"><button>&laquo; 入力ページへ戻る</button></a>
							</div>
							<div id="contact_formmail">
								<button type="submit">&raquo; 入力内容を送信する</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p class="copyright">Copyright 2015 &copy; form-sample All rights reserved.</p>
	</div>
</body>
</html>
