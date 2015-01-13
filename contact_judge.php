<?php

if (!$_POST) {
	header( 'Location: ./index.php' );
	exit;
}

//各種変数初期化
$err = "";

//未入力チェック
if ( $err == "" ) {

	if ( !isset( $_POST['subject'] ) ) $_POST['subject'] = null;
	if ( $_POST['subject'] == "" ) { $err .= "<li>※お問い合わせ項目が選択されていません。</li>\n"; }

	if ( $_POST['selectbox'] == "" ) { $err .= "<li>※セレクトボックスが選択されていません。</li>\n"; }

	if ( $_POST['full_name'] == "" ) { $err .= "<li>※お名前が入力されていません。</li>\n"; }

	if ( $_POST['tel'] == "" ) {
		$err .= "<li>※お電話番号が入力されていません。</li>\n";
	} else {
		if ( !mb_ereg( "^0\d{1,4}-\d{2,4}-\d{3,4}$", $_POST['tel'] ) ) {
			$err .= "<li>※電話番号が適切ではありません。</li>\n";
		}
	}

	if ( $_POST['mail'] == "" ) {
		$err .= "<li>※メールアドレスが入力されていません。</li>\n";
	} else {
		//メールアドレスのチェック
		$cp = "^[_A-Za-z0-9\-]+(\.[_A-Za-z0-9\-]+)*@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*$";
		if( !mb_ereg( $cp, $_POST['mail'] ) ) {
			$err .= "<li>※メールアドレスが適切ではありません。</li>\n";
		}
	}

	if ( $_POST['mail_confirm'] == "" ) {
		$err .= "<li>※確認用メールアドレスが入力されていません。</li>\n";
	} else {
		if ( $_POST['mail'] != $_POST['mail_confirm'] ) {
			$err .= "<li>※2つのメールアドレスが一致しません。</li>\n";
		}
	}

}


//以下メイン処理
if ( $err != "" ) :

	//エラー表示
	include( './index.php' );
	exit;

else :

	//エラーがなかった場合
	include( './contact_confirm.php' );
	exit;

endif;

?>
