<?php
/**********
 * �����ʼ� *
 **********/
function SendMail($address, $title, $message) {
	include_once ('../utils/include.php');
	
	$mail = new PHPMailer ();
	// ����PHPMailerʹ��SMTP����������Email
	$mail->IsSMTP ();
	
	// �����ʼ����ַ����룬����ָ������Ϊ'UTF-8'
	$mail->CharSet = 'UTF-8';
	
	// ����ռ��˵�ַ�����Զ��ʹ������Ӷ���ռ���
	$mail->AddAddress ( $address );
	
	// �����ʼ�����
	$mail->Body = $message;
	
	// �����ʼ�ͷ��From�ֶΡ�
	$mail->From = 'pengc_2012@126.com';
	
	// ���÷���������
	$mail->FromName = 'pcTest';
	// �����ʼ�����
	$mail->Subject = $title;
	
	// ����SMTP��������
	$mail->Host = 'smtp.126.com';
	
	// ����Ϊ����Ҫ��֤��
	$mail->SMTPAuth = true;
	
	// �����û��������롣
	$mail->Username = 'pengc_2012';
	$mail->Password = 'pengcheng';
	
	// �����ʼ���
	return ($mail->Send ());
}

?>