<?php
/**********
 * 发送邮件 *
 **********/
function SendMail($address, $title, $message) {
	include_once ('../utils/include.php');
	
	$mail = new PHPMailer ();
	// 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP ();
	
	// 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet = 'UTF-8';
	
	// 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress ( $address );
	
	// 设置邮件正文
	$mail->Body = $message;
	
	// 设置邮件头的From字段。
	$mail->From = 'pengc_2012@126.com';
	
	// 设置发件人名字
	$mail->FromName = 'pcTest';
	// 设置邮件标题
	$mail->Subject = $title;
	
	// 设置SMTP服务器。
	$mail->Host = 'smtp.126.com';
	
	// 设置为“需要验证”
	$mail->SMTPAuth = true;
	
	// 设置用户名和密码。
	$mail->Username = 'pengc_2012';
	$mail->Password = 'pengcheng';
	
	// 发送邮件。
	return ($mail->Send ());
}

?>