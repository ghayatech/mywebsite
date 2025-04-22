<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';


function detectDirection($text)
{
  // نتحقق من أول حرف عربي
  if (preg_match('/[\x{0600}-\x{06FF}]/u', $text)) {
    return 'rtl';
  }
  return 'ltr';
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = $_POST['name'] ?? '';
  $email   = $_POST['email'] ?? '';
  $message = $_POST['message'] ?? '';

  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP();
    $mail->Host       = $mail_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $mail_username;
    $mail->Password   = $mail_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = $mail_port;
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "base64";


    $mail->setFrom($mail_username, 'GayahTech');
    $mail->addAddress($mail_username); // ← بريدك نفسه أو أي بريد مستلم
    $mail->addReplyTo($email, $name);
    $mail->FromName = $name; // إذا كان الاسم يحتوي على حروف عربية

    $mail->Subject = "New Contact Message from $name";
    // $mail->Body    = "المرسل: $name\nالبريد: $email\n\nالرسالة:\n$message";
    //     $mail->Body    = "
    //     <h3>New Message Received</h3>
    //     <p><strong>Name:</strong> {$name}</p>
    //     <p><strong>Email:</strong> {$email}</p>
    //     <p><strong>Message:</strong><br>{$message}</p>
    // ";

    //     $mail->Body = "
    //   <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f5f5f5; color: #333;'>
    //     <div style='max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'>
    //       <h2 style='color: #4CAF50;'>📬 رسالة جديدة من الموقع</h2>
    //       <p><strong>👤 الاسم:</strong> $name</p>
    //       <p><strong>📧 البريد الإلكتروني:</strong> $email</p>
    //       <p><strong>💬 الرسالة:</strong></p>
    //       <div style='background-color:#f9f9f9; padding:15px; border-left:4px solid #4CAF50; border-radius:5px;'>
    //         <p style='margin:0;'>$message</p>
    //       </div>
    //       <hr style='margin:30px 0;'>
    //       <p style='font-size: 12px; color: #888;'>تم الإرسال من نموذج التواصل في موقعك.</p>
    //     </div>
    //   </div>
    // ";

    $direction = detectDirection($message);

    $mail->Body = "
  <div dir='$direction' style='font-family: Arial, sans-serif; padding: 20px; background-color: #f5f5f5; color: #333;'>
    <div style='max-width: 600px; margin: auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);'>
      <h2 style='color: #4CAF50;'>📬 رسالة جديدة من الموقع</h2>
      <p><strong>👤 الاسم:</strong> $name</p>
      <p><strong>📧 البريد الإلكتروني:</strong> $email</p>
      <p><strong>💬 الرسالة:</strong></p>
      <div style='background-color:#f9f9f9; padding:15px; border-left:4px solid #4CAF50; border-radius:5px;' dir='auto'>
        <p style='margin:0;'>$message</p>
      </div>
      <hr style='margin:30px 0;'>
      <p style='font-size: 12px; color: #888;'>تم الإرسال من نموذج التواصل في موقعك.</p>
    </div>
  </div>
";


    $mail->AltBody = "New message from $name\n\nEmail: $email\n\nMessage:\n" . strip_tags($message);

    $mail->send();
    echo "✅ تم إرسال الرسالة بنجاح";
  } catch (Exception $e) {
    echo "❌ فشل الإرسال: " . $mail->ErrorInfo;
  }
}
