<?php

if ( !$_POST || !$_SESSION['full_name'] == "" ) {
	header( 'Location: ./index.php' );
	exit;
}

session_start();
$_SESSION = $_POST;

//各種変数初期化
$err = "";

//未入力チェック
if ( $err == "" ) {

	if ( $_SESSION['subject'] == "" ) { $err .= "<li>※お問い合わせ項目が選択されていません。</li>\n"; }

	if ( $_SESSION['selectbox'] == "" ) { $err .= "<li>※セレクトボックスが選択されていません。</li>\n"; }

	if ( $_SESSION['full_name'] == "" ) { $err .= "<li>※お名前が入力されていません。</li>\n"; }

	if ( $_SESSION['tel'] == "" ) {
		$err .= "<li>※お電話番号が入力されていません。</li>\n";
	} else {
		if ( !mb_ereg( "^0\d{1,4}-\d{2,4}-\d{3,4}$", $_SESSION['tel'] ) ) {
			$err .= "<li>※電話番号が適切ではありません。</li>\n";
		}
	}

	if ( $_SESSION['mail'] == "" ) {
		$err .= "<li>※メールアドレスが入力されていません。</li>\n";
	} else {
		//メールアドレスのチェック
		$cp = "^[_A-Za-z0-9\-]+(\.[_A-Za-z0-9\-]+)*@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*$";
		if( !mb_ereg( $cp, $_SESSION['mail'] ) ) {
			$err .= "<li>※メールアドレスが適切ではありません。</li>\n";
		}
	}

	if ( $_SESSION['mail_confirm'] == "" ) {
		$err .= "<li>※確認用メールアドレスが入力されていません。</li>\n";
	} else {
		if ( $_SESSION['mail'] != $_SESSION['mail_confirm'] ) {
			$err .= "<li>※2つのメールアドレスが一致しません。</li>\n";
		}
	}

	if ( $_SESSION['detail'] == "" ) { $err .= "<li>※お問い合わせ内容が入力されていません。</li>\n"; }

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
