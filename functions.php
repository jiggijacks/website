<?php
 

include 'config.php';

include 'mailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

require_once "mailer/PHPMailer.php";
require_once "mailer/SMTP.php";
require_once "mailer/Exception.php";


function sendMail($email, $subject, $message)
{

  include 'db.php';
  $sql = mysqli_query($link, "SELECT * FROM settings WHERE id = 1 ");
  if (mysqli_num_rows($sql) > 0) {
    $data = mysqli_fetch_assoc($sql);
   
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
  
  $mail = new PHPMailer();
  //SMTP Settings (use default cpanel email account)

  $mail->isSMTP();
  $mail->Host = $data['mailhost']; //
  $mail->SMTPAuth = true;
  $mail->Username = $data['webmail']; // Default cpanel email account
  $mail->Password = $data['mailpassword']; // Default cpanel email password
  $mail->Port = $data['mailport']; // 587
  $mail->SMTPSecure = $data['mailsmtpsecure']; // tls

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom($data['webmail'], $data['sitename']); // Email address/ Bank bane shown to reciever
  $mail->addAddress($email);
  $mail->AddReplyTo($data['webmail'], $data['sitename']); // Email address/ Bank bane shown to reciever
  $mail->Subject = $subject;
  $mail->MsgHTML($message);
  $send = $mail->Send();
  return $send;
}

function customAlert($case, $content)
{
  switch ($case) {
    case 'success':
      $mesg =  '<script type="text/javascript">
          $(document).ready(function() {
              swal("Success", "' . $content . '", "success")    
          });
        </script>';
      break;

    case 'error':
      $mesg = '<script type="text/javascript">
              $(document).ready(function() {
                  sweetAlert("Error", "' . $content . '", "error")    
              });
          </script>';
      break;
    default:
      break;
  }
  return $mesg;
}

function pageRedirect($sec, $route)
{
  $c = "<meta http-equiv='refresh' Content='" . $sec . "; url=" . $route . " ' />";
  return $c;
}








// function sendMail($email, $subject, $body){
//   global $email_address, $email_name;
//   $message = "$body";
//   $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//     $headers .= 'From: '.$email_name.'<'.$email_address.'>' . "\r\n";
//     return mail($email,$subject,$message,$headers);
// }
