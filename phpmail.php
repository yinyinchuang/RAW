
<?php
//讀取 composer 所下載的套件
require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "mmmh61raw@gmail.com";
//  此信箱是為大專demo專用，為空信箱不怕外洩
$mail->Password   = "zlcnbwoilzvdtuaq";

$mail->IsHTML(true);
$mail->AddAddress($_GET['email'], $_GET['name']);
$mail->SetFrom("service@raw.com.tw", "赤著RAW團隊");
$mail->Subject = "赤著RAW ─ 忘記密碼";
$content = "會員驗證    <a href='http://localhost:8080/RAW/change_password.php?email=" . $_GET['email']  .   "' target='_blank'>請點選此連結</a>";
// 此處連結的資料夾要改成大家電腦的資料夾名稱

// $content = "會員驗證: <a href='http://localhost/raw/verify.php?verified_code=dae44e1a4b2cd0bc49b7f9fcc5cff556' target='_blank'>按我啟用</a>";
$mail->MsgHTML($content);

if ($mail->Send()) {
    echo "寄送成功！";
} else {
    echo "寄送失敗！";
    print_r($mail);
}
