<?PHP
// ����PHPMailer�ĺ����ļ� ʹ��require_once�����������PHPMailer���ظ�����ľ���
require_once ("phpmailer/class.phpmailer.php");
// ʾ����PHPMailer������
$mail = new PHPMailer ();

// �Ƿ�����smtp��debug���е��� �����������鿪�� ��������ע�͵����� Ĭ�Ϲر�debug����ģʽ
$mail->SMTPDebug = 1;

// ʹ��smtp��Ȩ��ʽ�����ʼ�����Ȼ�����ѡ��pop��ʽ sendmail��ʽ�� ���Ĳ������
// ���Բο�http://phpmailer.github.io/PHPMailer/���е���ϸ����
$mail->isSMTP ();
// smtp��Ҫ��Ȩ ���������true
$mail->SMTPAuth = true;
// ����qq��������ķ�������ַ
$mail->Host = 'smtp.qq.com';
// ����ʹ��ssl���ܷ�ʽ��¼��Ȩ
$mail->SMTPSecure = 'ssl';
// ����ssl����smtp��������Զ�̷������˿ں� ��ѡ465��587
$mail->Port = 465;
// ����smtp��helo��Ϣͷ ������п��� ��������
$mail->Helo = 'Hello smtp.qq.com Server';
// ���÷����˵������� ���п��� Ĭ��Ϊlocalhost �������⣬����ʹ���������
$mail->Hostname = 'jjonline.cn';
// ���÷��͵��ʼ��ı��� ��ѡGB2312 ��ϲ��utf-8 ��˵utf8��ĳЩ�ͻ��������»�����
$mail->CharSet = 'UTF-8';
// ���÷������������ǳƣ� �������ݣ���ʾ���ռ����ʼ��ķ����������ַǰ�ķ���������
$mail->FromName = '��������';
// smtp��¼���˺� ���������ַ�����ʽ��qq�ż���
$mail->Username = '888888';
// smtp��¼������ �������롰�������롱 ��Ϊ���á��������롱�������¼qq������ �������á��������롱
$mail->Password = 'xxxxxxx';
// ���÷����������ַ �������������ᵽ�ġ����������䡱
$mail->From = 'register@jjonline.cn';
// �ʼ������Ƿ�Ϊhtml���� ע��˴���һ������ ���������� true��false
$mail->isHTML ( true );
// �����ռ��������ַ �÷������������� ��һ������Ϊ�ռ��������ַ �ڶ�����Ϊ���õ�ַ���õ��ǳ� ��ͬ������ϵͳ���Զ����д���䶯 ����ڶ������������岻��
$mail->addAddress ( 'xxx@qq.com', '���������û�' );
// ��Ӷ���ռ��� ���ε��÷�������
$mail->addAddress ( 'xxx@163.com', '���������û�' );
// ��Ӹ��ʼ�������
$mail->Subject = 'PHPMailer�����ʼ���ʾ��';
// ����ʼ����� �Ϸ���isHTML���ó���true���������������html�ַ��� �磺ʹ��file_get_contents������ȡ���ص�html�ļ�
$mail->Body = "����һ��<b style=\"color:red;\">PHPMailer</b>�����ʼ���һ����������";
// Ϊ���ʼ���Ӹ��� �÷���Ҳ���������� ��һ������Ϊ������ŵ�Ŀ¼�����Ŀ¼�������Ŀ¼���ɣ� �ڶ�����Ϊ���ʼ������иø���������
$mail->addAttachment ( './d.jpg', 'mm.jpg' );
// ͬ���÷������Զ�ε��� �ϴ��������
$mail->addAttachment ( './Jlib-1.1.0.js', 'Jlib.js' );

// �������� ���ز���ֵ
// PS���������ԣ�Ҫ���ռ��˲����ڣ��������ִ�����Ȼ����true Ҳ����˵�ڷ���֮ǰ �Լ���ҪЩ����ʵ�ּ��������Ƿ���ʵ��Ч
$status = $mail->send ();

// �򵥵��ж�����ʾ��Ϣ
if ($status) {
	echo '�����ʼ��ɹ�';
} else {
	echo '�����ʼ�ʧ�ܣ�������Ϣδ��' . $mail->ErrorInfo;
}
?>