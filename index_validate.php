<?php
	if ( !isset( $err ) ) $err = null;
	if ( !isset( $_POST['subject'] ) ) $_POST['subject'] = null;
	if ( !isset( $_POST['selectbox'] ) ) $_POST['selectbox'] = null;
	if ( !isset( $_POST['checkbox'] ) ) $_POST['checkbox'] = null;
	if ( !isset( $checked1 ) ) $checked1 = null;
	if ( !isset( $checked2 ) ) $checked2 = null;
	if ( !isset( $checked3 ) ) $checked3 = null;
	if ( !isset( $_POST['company'] ) ) $_POST['company'] = null;
	if ( !isset( $_POST['full_name'] ) ) $_POST['full_name'] = null;
	if ( !isset( $_POST['pref'] ) ) $_POST['pref'] = null;
	if ( !isset( $_POST['address'] ) ) $_POST['address'] = null;
	if ( !isset( $_POST['tel'] ) ) $_POST['tel'] = null;
	if ( !isset( $_POST['fax'] ) ) $_POST['fax'] = null;
	if ( !isset( $_POST['mail'] ) ) $_POST['mail'] = null;
	if ( !isset( $_POST['mail_confirm'] ) ) $_POST['mail_confirm'] = null;
	if ( !isset( $_POST['detail'] ) ) $_POST['detail'] = null;
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
<link rel="stylesheet" href="./css/validationEngine.jquery.css">

<title>お問い合わせ | 問い合わせフォームサンプル</title>
</head>
<body class="contact">
	<div class="wrapper">
		<div class="header">
			<h1 class="page_title">問い合わせフォームサンプル</h1>
			<div class="header_area clear-fix">
				<h2 class="header_logo"><a href="./index.php">問い合わせフォームサンプル</a></h2>
			</div>
		</div>
		<div class="mainarea">
			<div class="section contents_contact">

			<?php if ( ( $err == "" ) && ( empty( $_POST['revision'] ) ) ) : ?>
				<div class="contact_info">
					<p>ご依頼内容を、以下にご入力下さい。のちほど担当者よりご連絡いたします。</p>
					<p>お急ぎの際はお電話にてお問い合わせください。</p>
					<p class="contact_phone">TEL:03-xxxx-xxxx</p>
				</div>
			<?php endif; ?>

				<div class="area_contactform">
					<h1 class="title_contactformtext">お問い合わせフォーム</h1>

				<?php if ( $err != "" ) : ?>
					<div id="errorbox">
						<ul><?php echo $err; ?></ul>
					</div>
				<?php endif; ?>

					<form method="post" action="contact_judge.php" id="contact_form">
						<div class="form_table">
							<dl>
								<dt><span class="required">お問い合わせ項目</span></dt>
								<dd>
									<ul>
<?php /*
										<li><input type="radio" id="subject1" name="subject" value="">&nbsp;<label for="subject1">選択肢1</label></li>
										<li><input type="radio" id="subject2" name="subject" value="">&nbsp;<label for="subject2">選択肢2</label></li>
										<li><input type="radio" id="subject3" name="subject" value="">&nbsp;<label for="subject3">選択肢3</label></li>
										<li><input type="radio" id="subject4" name="subject" value="">&nbsp;<label for="subject4">選択肢4</label></li>
*/ ?>
										<li><input type="radio" id="subject1" name="subject" value="選択肢1" <?php if ( $_POST['subject'] == "選択肢1" ) { ?> checked="checked"<?php } ?> class="validate[required]">&nbsp;<label for="subject1">選択肢1</label></li>
										<li><input type="radio" id="subject2" name="subject" value="選択肢2" <?php if ( $_POST['subject'] == "選択肢2" ) { ?> checked="checked"<?php } ?> class="validate[required]">&nbsp;<label for="subject2">選択肢2</label></li>
										<li><input type="radio" id="subject3" name="subject" value="選択肢3" <?php if ( $_POST['subject'] == "選択肢3" ) { ?> checked="checked"<?php } ?> class="validate[required]">&nbsp;<label for="subject3">選択肢3</label></li>
										<li><input type="radio" id="subject4" name="subject" value="選択肢4" <?php if ( $_POST['subject'] == "選択肢4" ) { ?> checked="checked"<?php } ?> class="validate[required]">&nbsp;<label for="subject4">選択肢4</label></li>
									</ul>
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required]">セレクトボックス</span></dt>
								<dd>
									<p>
										<select name="selectbox" id="selectbox" value="">
<?php /*
											<option value="">お選びください</option>
											<option value="">選択肢1</option>
											<option value="">選択肢2</option>
											<option value="">選択肢3</option>
											<option value="">選択肢4</option>
*/ ?>
											<option value=""<?php if ( $_POST['selectbox'] == "お選びください" ) { ?> selected<?php } ?>>お選びください</option>
											<option value="選択肢1"<?php if ( $_POST['selectbox'] == "選択肢1" ) { ?> selected<?php } ?>>選択肢1</option>
											<option value="選択肢2"<?php if ( $_POST['selectbox'] == "選択肢2" ) { ?> selected<?php } ?>>選択肢2</option>
											<option value="選択肢3"<?php if ( $_POST['selectbox'] == "選択肢3" ) { ?> selected<?php } ?>>選択肢3</option>
											<option value="選択肢4"<?php if ( $_POST['selectbox'] == "選択肢4" ) { ?> selected<?php } ?>>選択肢4</option>
										</select>
									</p>
								</dd>
							</dl>
							<dl>
								<dt><span>チェックボックス</span></dt>
								<dd>
									<ul class="clear-fix">
<?php /*
									<?php
										if ( !isset( $_POST['checkbox'] ) ) {
											$_POST['checkbox'] = null;
										} else {
											for ( $i = 0; $i < count( $_POST['checkbox'] ); $i++ ) {
												if ( ( $_POST['checkbox'][$i] ) == "選択肢1" ) {
													if ( !isset( $checked1 ) ) $checked1 = null;
													$checked1 = "checked";
												} elseif ( ( $_POST['checkbox'][$i] ) == "選択肢2" ) {
													if ( !isset( $checked2 ) ) $checked2 = null;
													$checked2 = "checked";
												} elseif ( ( $_POST['checkbox'][$i] ) == "選択肢3" ) {
													if ( !isset( $checked3 ) ) $checked3 = null;
													$checked3 = "checked";
												} else {
												}
											}
										}
									?>

										<li>
											<input type="checkbox" id="checkbox1" name="checkbox[]" value="">&nbsp;<label for="checkbox1">選択肢1</label>
										</li>
										<li>
											<input type="checkbox" id="checkbox2" name="checkbox[]" value="">&nbsp;<label for="checkbox2">選択肢2</label>
										</li>
										<li>
											<input type="checkbox" id="checkbox3" name="checkbox[]" value="">&nbsp;<label for="checkbox3">選択肢3</label>
										</li>
*/ ?>

									<?php
										if ( !isset( $_POST['checkbox'] ) ) {
											$_POST['checkbox'] = null;
										} else {
											for ( $i = 0; $i < count( $_POST['checkbox'] ); $i++ ) {
												if ( ( $_POST['checkbox'][$i] ) == "選択肢1" ) {
													if ( !isset( $checked1 ) ) $checked1 = null;
													$checked1 = "checked";
												} elseif ( ( $_POST['checkbox'][$i] ) == "選択肢2" ) {
													if ( !isset( $checked2 ) ) $checked2 = null;
													$checked2 = "checked";
												} elseif ( ( $_POST['checkbox'][$i] ) == "選択肢3" ) {
													if ( !isset( $checked3 ) ) $checked3 = null;
													$checked3 = "checked";
												} else {
												}
											}
										}
									?>

										<li>

										<?php if ( !isset( $checked1 ) ) $checked1 = null; ?>
											<input type="checkbox" id="checkbox1" name="checkbox[]" value="選択肢1" <?php echo $checked1; ?>>&nbsp;<label for="checkbox1">選択肢1</label>
										</li>
										<li>

										<?php if ( !isset( $checked2 ) ) $checked2 = null; ?>
											<input type="checkbox" id="checkbox2" name="checkbox[]" value="選択肢2" <?php echo $checked2; ?>>&nbsp;<label for="checkbox2">選択肢2</label>
										</li>
										<li>

										<?php if ( !isset( $checked3 ) ) $checked3 = null; ?>
											<input type="checkbox" id="checkbox3" name="checkbox[]" value="選択肢3" <?php echo $checked3; ?>>&nbsp;<label for="checkbox3">選択肢3</label>
										</li>
									</ul>
								</dd>
							</dl>
							<dl>
								<dt><span>御社名</span></dt>
								<dd>
<?php /*
									<input type="text" name="company" value="" maxlength="255" placeholder="(例） 株式会社 ◯◯◯◯" title="(例） 株式会社 ◯◯◯◯">
*/ ?>
									<input type="text" id="company" name="company" value="<?php echo ($_POST['company']); ?>" maxlength="255" placeholder="(例） 株式会社 ◯◯◯◯" title="(例） 株式会社 ◯◯◯◯">
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required]">お名前</span></dt>
								<dd>
<?php /*
									<input type="text" name="full_name" value="" maxlength="255" placeholder="(例） 山田 太郎" title="(例） 山田 太郎">
*/ ?>
									<input type="text" id="full_name" name="full_name" value="<?php echo ($_POST['full_name']); ?>" maxlength="255" placeholder="(例） 山田 太郎" title="(例） 山田 太郎">
								</dd>
							</dl>
							<dl>
								<dt><span>ご住所</span></dt>
								<dd>

								<?php require_once( 'inc/select_pref.php' ); ?>

								</dd>
							</dl>
							<dl>
								<dt><span>&nbsp;</span></dt>
								<dd>
<?php /*
									<input type="text" name="address" value="" maxlength="255" placeholder="(例） 港区六本木6－10－1 六本木ヒルズ森タワー 53F" title="(例） 港区六本木6－10－1 六本木ヒルズ森タワー 53F" class="longarea">
*/ ?>
									<input type="text" id="address" name="address" value="<?php echo ($_POST['address']); ?>" maxlength="255" placeholder="(例） 港区六本木6－10－1 六本木ヒルズ森タワー 53F" title="(例） 港区六本木6－10－1 六本木ヒルズ森タワー 53F" class="longarea">
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required,phone]">お電話番号</span></dt>
								<dd>
<?php /*
									<input type="text" name="tel" value="" maxlength="30" placeholder="(例) 03-xxxx-xxxx" title="(例) 03-xxxx-xxxx" style="ime-mode: disabled;" class="restrict_mb">
*/ ?>
									<input type="text" id="tel" name="tel" value="<?php echo ($_POST['tel']); ?>" maxlength="30" placeholder="(例) 03-xxxx-xxxx" title="(例) 03-xxxx-xxxx" style="ime-mode: disabled;" class="restrict_mb">
								</dd>
							</dl>
							<dl>
								<dt><span class="validate[optional,custom[phone]]">FAX</span></dt>
								<dd>
<?php /*
									<input type="text" name="fax" value="" maxlength="30" placeholder="(例) 03-xxxx-xxxx" title="(例) 03-xxxx-xxxx" style="ime-mode: disabled;" class="restrict_mb">
*/ ?>
									<input type="text" id="fax" name="fax" value="<?php echo ($_POST['fax']); ?>" maxlength="30" placeholder="(例) 03-xxxx-xxxx" title="(例) 03-xxxx-xxxx" style="ime-mode: disabled;" class="restrict_mb">
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required,custom[email]]">メールアドレス</span></dt>
								<dd>
<?php /*
									<input type="text" name="mail" value="" maxlength="255" placeholder="(例) sample@example.com" title="(例) sample@example.com" style="ime-mode: disabled;" class="longarea restrict_mb">
*/ ?>
									<input type="text" id="mail" name="mail" value="<?php if ( isset( $_POST['mail'] ) ) echo ($_POST['mail']); ?>" maxlength="255" placeholder="(例) sample@example.com" title="(例) sample@example.com" style="ime-mode: disabled;" class="longarea restrict_mb">
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required,custom[email],equals[mail]]">メールアドレス（確認用）</span></dt>
								<dd>
<?php /*
									<input type="text" name="mail_confirm" value="" maxlength="255" placeholder="(例) sample@example.com" title="(例) sample@example.com" style="ime-mode: disabled;" class="longarea restrict_mb">
*/ ?>
									<input type="text" id="mail_confirm" name="mail_confirm" value="<?php if ( isset( $_POST['mail_confirm'] ) ) echo ($_POST['mail_confirm']); ?>" maxlength="255" placeholder="(例) sample@example.com" title="(例) sample@example.com" style="ime-mode: disabled;" class="longarea restrict_mb">
								</dd>
							</dl>
							<dl>
								<dt><span class="required validate[required]">お問い合わせ内容</span></dt>
								<dd>
<?php /*
									<textarea name="detail"></textarea>
*/ ?>
									<textarea name="detail" id="detail"><?php echo ($_POST['detail']); ?></textarea>
								</dd>
							</dl>
						</div>
						<div class="btn_confirm">
							<button type="submit">&raquo; 入力内容確認ページへ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p class="copyright">Copyright 2015 &copy; form-sample All rights reserved.</p>
	</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/jquery.validationEngine-ja.js" type="text/javascript"></script>
<script src="./js/jquery.validationEngine.js" type="text/javascript"></script>
<script>
	(function($){
		$("#contact_form").validationEngine();
	})(jQuery);
</script>
<script>
	(function($){
		$(".restrict_mb").change(function(){
			var str = $(this).val();
			str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});
			$(this).val(str);
		}).change();
	})(jQuery);
</script>
</body>
</html>
