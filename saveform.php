 

    <?php
//require 'mail/PHPMailerAutoload.php';
include 'class.phpmailer.php';
 

$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);			
//$phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);	
$mesaj =filter_var( $_POST["message"], FILTER_SANITIZE_STRING);	 


if (!$name) { $err = "Please enter your first and surname.";}
else if (!$email) { $err = "Please enter your e-mail address.";}


if (!$err) {
    $body = "<b>NETİA İLETİŞİM FORMU </b><br><br>" ;
    $body .= "<b>Adı Soyadı : </b>".$name."<br>" ;
    //$body .= "<b>Telefon : </b>".$phone."<br>" ;
    $body .= "<b>E-posta : </b>".$email."<br>" ;
    $body .= "<b>Mesaj :</b>".$mesaj."<br>" ;
	$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->From     = "form@netia.com.tr";
    $mail->FromName = "form@etia.com.tr";
    $mail->Host     = "mail.netia.com.tr"; //localhost
    $mail->SMTPAuth = "true";
    $mail->Username = "form@netia.com.tr"; //form@berkaybarlas.net
    $mail->Password = "fv14KwDR__R:@32g"; //şifre  form@berkaybarlas.net şifresi:  0]2Ey[TW
    $mail->Mailer   = "smtp";
    $mail->Subject   = "NETİA İLETİŞİM FORMU";
	$mail->Port	= 587;
	$mail->CharSet  = "utf-8";	
    $mail->Body     = $body;
    $mail->IsHTML(true); 
    $mail->AddAddress("info@netia.com.tr");
    $mail->AddAddress("yusufberkaybarlas@gmail.com");
    if(!$mail->Send())
    {
        $err =  "There was a problem submitting the form. Please send it to info@netia.com.tr e-mail address.";
    } else {
        $err = 1;
    }
}

echo json_encode(array("err"=> $err));

?>