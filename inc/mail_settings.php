<?php

// ================== 返信フォームのための入力項目ここから ==================


// -+-+-+-+-+-+-+-+-+-+-+-+- 【 メールアドレスのみ納品前に再確認! 】 -+-+-+-+-+-+-+-+-+-+-+-

//クライアント様受信先メールアドレス設定
// $admin_mailto = "";
// $admin_mailto = "web@lunalunadesign.com";
$admin_mailto = "saiki@ace-union.net";

// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-


//++++++++++以下必須入力項目++++++++++

//クライアント様名称
$admin_name = "株式会社 ◯◯◯◯";
//クライアント様郵便番号
$admin_zipcode = "xxx-xxxx";
//クライアント様ご住所
$admin_address = "東京都港区六本木6－10－1 六本木ヒルズ森タワー 53F";
//クライアント様電話番号
$admin_phone = "03-xxxx-xxxx";
//クライアント様サイトURL
$admin_url = "http://example.com";

//+++++++++++++++ここまで+++++++++++++++



//++++++++++任意入力項目++++++++++

//クライアント様fax番号
$admin_fax = "03-xxxx-xxxx";
//クライアント様お問い合わせ受付時間
$admin_hours = "9:00～18:00";
//クライアント様定休日
$admin_regular_holiday = "土日祝日";

//+++++++++++++ここまで+++++++++++++


//++++++もし返信用メールアドレスを別途表記する場合は++++++

//お客さま返信表記用メールアドレス
$admin_infomail = "sample@example.com";

if ( $admin_infomail == "" ) {
	$admin_infomail = $admin_mailto;
}

//++++++++++++++++++++ここまで++++++++++++++++++++


// ================== 返信フォームのための入力項目ここまで ==================

?>
