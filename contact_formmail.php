<?php
if (!$_POST) {
	header( 'Location: ./index.php' );
	exit;
}

include( "inc/mail_settings.php" );

session_start();

//++++++++++機種依存文字対応++++++++++


// 言語設定、内部エンコーディングを指定する
mb_language( "japanese" );
mb_internal_encoding( "UTF-8" );


//半角カタカナを全角に・全角数字を半角に
$company = htmlspecialchars( $_SESSION['company'], ENT_QUOTES, "UTF-8" );
$company = mb_convert_kana( $company,"nKV", "UTF-8" );

$full_name = htmlspecialchars( $_SESSION['full_name'], ENT_QUOTES, "UTF-8" );
$full_name = mb_convert_kana( $full_name,"nKV", "UTF-8" );

$address = htmlspecialchars( $_SESSION['address'], ENT_QUOTES, "UTF-8" );
$address = mb_convert_kana( $address,"nKV", "UTF-8" );


// 機種依存文字置き換えの関数 読込
require_once( dirname(__FILE__) . '/inc/replaceStrKishuizon.php' );


// 機種依存文字置き換え
$company = replaceStrKishuizon( $company );
$full_name = replaceStrKishuizon( $full_name );
$address = replaceStrKishuizon( $address );


// 問い合わせ詳細の文面から機種依存文字チェック
$detail = htmlspecialchars( $_SESSION['detail'], ENT_QUOTES, "UTF-8" );
$detail = mb_convert_kana( $detail,"nKV", "UTF-8" );
$detail = stripslashes( $detail );
$detail = replaceStrKishuizon( $detail );


//+++++++++++++++ここまで++++++++++++++



// ============ クライアント様向け詳細内容(フォームの入力項目)ここから ============

$prof_format = "
お問い合わせ項目 ： %s
セレクトボックス ： %s
チェックボックス ： %s %s %s
御社名 ： %s
お名前 ： %s 様
ご住所 ： %s %s
お電話番号 ： %s
FAX ： %s
メールアドレス ： %s
お問い合わせ内容 ： %s
";

$profile = sprintf($prof_format,
	htmlspecialchars( $_SESSION['subject'], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['selectbox'], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['checkbox'][0], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['checkbox'][1], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['checkbox'][2], ENT_QUOTES, "UTF-8" ),
	$company,
	$full_name,
	htmlspecialchars( $_SESSION['pref'], ENT_QUOTES, "UTF-8" ),
	$address,
	htmlspecialchars( $_SESSION['tel'], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['fax'], ENT_QUOTES, "UTF-8" ),
	htmlspecialchars( $_SESSION['mail'], ENT_QUOTES, "UTF-8" ),
	$detail
);


// ============ クライアント様向け詳細内容(フォームの入力項目)ここまで ============


// ############################## 【 通常ここ以下は触る必要なし 】 ##########################




//以下メイン処理


// 日付，サーバー情報等取得
$dstr = date(" Y/m/d(D) H:i:s");			//日付
$dstr = htmlspecialchars( $dstr, ENT_QUOTES, "UTF-8" );
$addr = $_SERVER['REMOTE_ADDR'];			//アドレス
$addr = htmlspecialchars( $addr, ENT_QUOTES, "UTF-8" );
// $proxy = $_SERVER['HTTP_FORWARDED'];		//proxy
// $proxy = htmlspecialchars( $proxy, ENT_QUOTES, "UTF-8" );
$agent = $_SERVER['HTTP_USER_AGENT'];		//agent
$agent = htmlspecialchars( $agent, ENT_QUOTES, "UTF-8" );


//結果をまとめる


$user_reply =

$full_name . "様

この度は、" . $admin_name . " ホームページより
お問い合わせをいただきまして誠にありがとうございます。

数日中に弊社の担当者よりご連絡させていただきますので
いましばらくお待ちくださいますようお願い申しあげます。

お急ぎの場合は、

お電話 ： " . $admin_phone . "\n";
if ( !empty( $admin_hours ) ) $user_reply .= "（お問い合わせ受付時間：" . $admin_hours . " ）\n\n";

if ( !empty( $admin_fax ) ) $user_reply .= "FAX ： " . $admin_fax . "\n";
if ( !empty( $admin_regular_holiday ) ) $user_reply .= "（" . $admin_regular_holiday . "定休）\n";

$user_reply .= "
までご連絡いただけますようお願いいたします。
その際にメールの送信日時とお問い合わせ内容をお伝えください。

何卒よろしくお願い申し上げます。


---------------------------------------------------------------------------
■以下に、ご入力いただきました内容を記載致します■\n
";


$footer = "
━━━━━━━━━━━━━━━━━━━━━━━━
";
$footer .= $admin_name . "\n\n";

$footer .= "〒" . $admin_zipcode . "\n" . $admin_address . "\n\n";

$footer .= "TEL ： " . $admin_phone . " / FAX ：" . $admin_fax . "\n";
if( $admin_regular_holiday ) $footer .= "（" . $admin_regular_holiday . "定休)\n";

$footer .= "URL ： " . $admin_url . "\n";
$footer .= "━━━━━━━━━━━━━━━━━━━━━━━━
";


//メール送信：クライアント向け受信メール
$user_mailto = $_SESSION['mail'];
$user_mailto = htmlspecialchars( $user_mailto, ENT_QUOTES, "UTF-8" );
$user_mailto = mb_convert_encoding( $user_mailto, "UTF-8", "auto" );
$admin_subject = "【".$admin_name."】ホームページよりお問い合わせ";
$admin_subject = mb_convert_encoding( $admin_subject, "UTF-8", "auto" );
// $admin_header = "受信日時：$dstr\nIPアドレス：$addr\nプロキシ：$proxy\nユーザーエージェント：$agent\n\n";
$admin_header = "受信日時：$dstr\nIPアドレス：$addr\nユーザーエージェント：$agent\n\n";
$admin_header = htmlspecialchars( $admin_header, ENT_QUOTES, "UTF-8" );
$admin_from = mb_encode_mimeheader( mb_convert_encoding( $full_name."様","UTF-8","auto" ) )."<".$user_mailto.">";
$admin_result = $admin_header . $profile;
$admin_result = mb_convert_encoding( $admin_result, "UTF-8","auto" );

//メール送信：顧客向け確認メール
$user_subject = "【".$admin_name."】お問い合わせありがとうございました";
$user_subject = mb_convert_encoding( $user_subject, "UTF-8","auto" );
$user_header = "送信日時：$dstr\n";
$user_header = htmlspecialchars( $user_header, ENT_QUOTES, "UTF-8" );
$user_from = mb_encode_mimeheader( mb_convert_encoding( $admin_name, "UTF-8", "auto" ) )."<".$admin_infomail.">";
$user_result = $user_header . $user_reply . $profile . $footer;
$user_result = mb_convert_encoding( $user_result, "UTF-8","auto" );

$admin_send = mb_send_mail( $admin_mailto, $admin_subject, $admin_result, "From:" . $admin_from );
$user_send = mb_send_mail( $user_mailto, $user_subject, $user_result, "From:" . $user_from );

//完了メッセージへリダイレクト・送信エラーのアラート

$alert_msg = "";

if ($admin_send && $user_send) :

	session_destroy();

	header( 'location: ./contact_thanks.php' );
	exit;

//else :

//	$alert_msg = "送信処理が失敗しました。大変恐れ入りますが、再度送信ボタンを押してください。";
//	include('./contact_confirm.php');
//	exit;

endif;

?>
