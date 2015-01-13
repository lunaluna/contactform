<?php
if (!$_POST) {
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
					<div class="form_table form_confirm">
						<dl>
							<dt>お問い合わせ項目</dt>
							<dd><?php echo htmlspecialchars( $_POST['subject'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>セレクトボックス</dt>
							<dd><?php echo htmlspecialchars( $_POST['selectbox'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>チェックボックス</dt>
							<dd>
								<?php
									if ( isset( $_POST['checkbox'] ) ) {
										for ( $i = 0; $i < count( $_POST['checkbox'] ); $i++ ) {
											if ( $i == ( ( count( $_POST['checkbox'] ) ) - 1 ) ) {
												echo htmlspecialchars( $_POST['checkbox'][$i], ENT_QUOTES, "UTF-8" );
											} else {
												echo htmlspecialchars( $_POST['checkbox'][$i], ENT_QUOTES, "UTF-8" ) ."、 ";
											}
										}
									}
								?>
							</dd>
						</dl>
						<dl>
							<dt>御社名</dt>
							<dd><?php echo htmlspecialchars( $_POST['company'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>お名前</dt>
							<dd><?php echo htmlspecialchars( $_POST['full_name'], ENT_QUOTES, "UTF-8" ); ?> 様</dd>
						</dl>
						<dl>
							<dt>ご住所</dt>
							<dd><?php echo htmlspecialchars( $_POST['pref'], ENT_QUOTES, "UTF-8" ); echo htmlspecialchars( $_POST['address'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>お電話番号</dt>
							<dd><?php echo htmlspecialchars( $_POST['tel'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>FAX</dt>
							<dd><?php echo htmlspecialchars( $_POST['fax'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>メールアドレス</dt>
							<dd><?php echo htmlspecialchars( $_POST['mail'], ENT_QUOTES, "UTF-8" ); ?></dd>
						</dl>
						<dl>
							<dt>お問い合わせ内容</dt>
							<dd><?php echo nl2br( htmlspecialchars( $_POST['detail'], ENT_QUOTES, "UTF-8" ) ); ?></dd>
						</dl>
					</div>
					<div id="btn_submitarea" class="clear-fix">
						<form method="post" action="./index.php" name="contact_back" class="contact_back">
							<input type="hidden" id="subject" name="subject" value="<?php echo htmlspecialchars( $_POST['subject'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="selectbox" name="selectbox" value="<?php echo htmlspecialchars( $_POST['selectbox'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][0] ) ) $_POST['checkbox'][0] = null; echo htmlspecialchars( $_POST['checkbox'][0], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][1] ) ) $_POST['checkbox'][1] = null; echo htmlspecialchars( $_POST['checkbox'][1], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][2] ) ) $_POST['checkbox'][2] = null; echo htmlspecialchars( $_POST['checkbox'][2], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="company" name="company" value="<?php echo htmlspecialchars( $_POST['company'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="full_name" name="full_name" value="<?php echo htmlspecialchars( $_POST['full_name'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="pref" name="pref" value="<?php echo htmlspecialchars( $_POST['pref'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="address" name="address" value="<?php echo htmlspecialchars( $_POST['address'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="tel" name="tel" value="<?php echo htmlspecialchars( $_POST['tel'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="fax" name="fax" value="<?php echo htmlspecialchars( $_POST['fax'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="mail" name="mail" value="<?php echo htmlspecialchars( $_POST['mail'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="mail_confirm" name="mail_confirm" value="<?php echo htmlspecialchars( $_POST['mail_confirm'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="detail" name="detail" value="<?php echo htmlspecialchars( $_POST['detail'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="revision" name="revision" value="revision">
							<div id="contact_back">
								<button type="submit">&laquo; 入力ページへ戻る</button>
							</div>
						</form>
						<form method="post" action="./contact_formmail.php" name="contact_formmail" class="contact_formmail">
							<input type="hidden" id="subject" name="subject" value="<?php echo htmlspecialchars( $_POST['subject'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="selectbox" name="selectbox" value="<?php echo htmlspecialchars( $_POST['selectbox'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][0] ) ) $_POST['checkbox'][0] = null; echo htmlspecialchars( $_POST['checkbox'][0], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][1] ) ) $_POST['checkbox'][1] = null; echo htmlspecialchars( $_POST['checkbox'][1], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="checkbox" name="checkbox[]" value="<?php if ( !isset( $_POST['checkbox'][2] ) ) $_POST['checkbox'][2] = null; echo htmlspecialchars( $_POST['checkbox'][2], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="company" name="company" value="<?php echo htmlspecialchars( $_POST['company'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="full_name" name="full_name" value="<?php echo htmlspecialchars( $_POST['full_name'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="pref" name="pref" value="<?php echo htmlspecialchars( $_POST['pref'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="address" name="address" value="<?php echo htmlspecialchars( $_POST['address'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="tel" name="tel" value="<?php echo htmlspecialchars( $_POST['tel'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="fax" name="fax" value="<?php echo htmlspecialchars( $_POST['fax'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="mail" name="mail" value="<?php echo htmlspecialchars( $_POST['mail'], ENT_QUOTES, "UTF-8" ); ?>">
							<input type="hidden" id="detail" name="detail" value="<?php echo htmlspecialchars( $_POST['detail'], ENT_QUOTES, "UTF-8" ); ?>">
							<div id="contact_formmail">
								<button type="submit">&raquo; 入力内容を送信する</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p class="copyright">Copyright 2015 &copy; form-sample All rights reserved.</p>
	</div>
</body>
</html>
