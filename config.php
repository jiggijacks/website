<?php  

include 'db.php';

$sql = mysqli_query($link, "SELECT * FROM settings WHERE id = 1 ");
if (mysqli_num_rows($sql) > 0) {
	$data = mysqli_fetch_assoc($sql);
	$track_prefix = $data['track_prefix'];
	$track_num = $data['track_num'];
	$invoice_terms = $data['invoice_terms'];
	$allow_print = $data['allow_print'];
	$show_map = $data['show_map'];

	$email_name = $data['email_name'];
	$mail_track_update = $data['mail_track_update'];
	$mail_track_save = $data['mail_track_save'];

	$sitename = $data['sitename'];
	$site_title = $data['site_title'];
	$site_url = $data['site_url'];
	$invoice_terms = $data['invoice_terms'];


	$mail_host = $data['mailhost'];
	$web_mail = $data['webmail'];
	$mail_password = $data['mailpassword'];
	$mail_port = $data['mailport'];
	$mail_smtp_secure = $data['mailsmtpsecure'];
}


// $sql = mysqli_query($link, "SELECT * FROM setting WHERE id = 1 ");
// if (mysqli_num_rows($sql) > 0) {
//   $row = mysqli_fetch_assoc($sql);
//   $_site_url = $row['siteurl'];
//   $_site_name = $row['sitename'];
//   $_email = $row['email'];
//   $_Social_Contact = $row['socialcontact'];
//   $_Gasfee = $row['gas_Fee'];
//   $_Ethereum_Wallet_Address = $row['walletaddress'];
//   $_mail_host = $row['mailhost'];
//   $_webmail = $row['webmail'];
//   $_mail_password = $row['mailpassword'];
//   $_mail_port = $row['mailport'];
//   $_mail_smtp_secure = $row['mailsmtpsecure'];
// }


// function sendMail($email, $subject, $body){
// 	global $email_address, $email_name;
// 	$message = "$body";
// 	$headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//     $headers .= 'From: '.$email_name.'<'.$email_address.'>' . "\r\n";
//     return mail($email,$subject,$message,$headers);
// }

?>