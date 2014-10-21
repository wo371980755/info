<?php
/**  
* ���ù�����  
* author Lee.  
* Last modify $Date: 2012-8-23
*/
class Tools {
	static public function set($entity, $name, $value) {
		$entity->name = $value;
	}
	static public function get($entity, $name) {
		return $entity->name;
	}
	static public function isEmpty($str) {
		return ($str == "" || $str == null);
	}
	
	/**
	 * js ����������ת
	 *
	 * @param string $_info        	
	 * @param string $_url        	
	 * @return js
	 */
	static public function alertLocation($_info, $_url) {
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit ();
	}
	
	/**
	 * js ��������
	 *
	 * @param string $_info        	
	 * @return js
	 */
	static public function alertBack($_info) {
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit ();
	}
	
	/**
	 * ҳ����ת
	 *
	 * @param string $url        	
	 * @return js
	 */
	static public function headerUrl($url) {
		echo "<script type='text/javascript'>location.href='{$url}';</script>";
		exit ();
	}
	
	/**
	 * �����ر�
	 *
	 * @param string $_info        	
	 * @return js
	 */
	static public function alertClose($_info) {
		echo "<script type='text/javascript'>alert('$_info');close();</script>";
		exit ();
	}
	
	/**
	 * ����
	 *
	 * @param string $_info        	
	 * @return js
	 */
	static public function alert($_info) {
		echo "<script type='text/javascript'>alert('$_info');</script>";
		exit ();
	}
	
	/**
	 * ϵͳ���������ϴ�ͼƬר��
	 *
	 * @param string $_path        	
	 * @return null
	 */
	static public function sysUploadImg($_path) {
		echo '<script type="text/javascript">document.getElementById("logo").value="' . $_path . '";</script>';
		echo '<script type="text/javascript">document.getElementById("pic").src="' . $_path . '";</script>';
		echo '<script type="text/javascript">$("#loginpop1").hide();</script>';
		echo '<script type="text/javascript">$("#bgloginpop2").hide();</script>';
	}
	
	/**
	 * html����
	 *
	 * @param array|object $_date        	
	 * @return string
	 */
	static public function htmlString($_date) {
		if (is_array ( $_date )) {
			foreach ( $_date as $_key => $_value ) {
				$_string [$_key] = Tool::htmlString ( $_value ); // �ݹ�
			}
		} elseif (is_object ( $_date )) {
			foreach ( $_date as $_key => $_value ) {
				$_string->$_key = Tool::htmlString ( $_value ); // �ݹ�
			}
		} else {
			$_string = htmlspecialchars ( $_date );
		}
		return $_string;
	}
	
	/**
	 * ���ݿ��������
	 *
	 * @param string $_data        	
	 * @return string
	 */
	static public function mysqlString($_data) {
		$_data = trim ( $_data );
		return ! GPC ? addcslashes ( $_data ) : $_data;
	}
	
	/**
	 * ����session
	 */
	static public function unSession() {
		if (session_start ()) {
			session_destroy ();
		}
	}
	
	/**
	 * ��֤�Ƿ�Ϊ��
	 *
	 * @param string $str        	
	 * @param string $name        	
	 * @return bool (true or false)
	 */
	static function validateEmpty($str, $name) {
		if (empty ( $str )) {
			self::alertBack ( '���棺' . $name . '����Ϊ�գ�' );
		}
	}
	
	/**
	 * ��֤�Ƿ���ͬ
	 *
	 * @param string $str1        	
	 * @param string $str2        	
	 * @param string $alert        	
	 * @return JS
	 */
	static function validateAll($str1, $str2, $alert) {
		if ($str1 != $str2)
			self::alertBack ( '���棺' . $alert );
	}
	
	/**
	 * ��֤ID
	 *
	 * @param Number $id        	
	 * @return JS
	 */
	static function validateId($id) {
		if (empty ( $id ) || ! is_numeric ( $id ))
			self::alertBack ( '���棺��������' );
	}
	
	/**
	 * ��ʽ���ַ���
	 *
	 * @param string $str        	
	 * @return string
	 */
	static public function formatStr($str) {
		$arr = array (
				' ',
				'	',
				'&',
				'@',
				'#',
				'%',
				'\'',
				'"',
				'\\',
				'/',
				'.',
				',',
				'$',
				'^',
				'*',
				'(',
				')',
				'[',
				']',
				'{',
				'}',
				'|',
				'~',
				'`',
				'?',
				'!',
				';',
				':',
				'-',
				'_',
				'+',
				'=' 
		);
		foreach ( $arr as $v ) {
			$str = str_replace ( $v, '', $str );
		}
		return $str;
	}
	
	/**
	 * ��ʽ��ʱ��
	 *
	 * @param int $time
	 *        	ʱ���
	 * @return string
	 */
	static public function formatDate($time = 'default') {
		$date = $time == 'default' ? date ( 'Y-m-d H:i:s', time () ) : date ( 'Y-m-d H:i:s', $time );
		return $date;
	}
	
	/**
	 * �����ʵIP��ַ
	 *
	 * @return string
	 */
	static public function realIp() {
		static $realip = NULL;
		if ($realip !== NULL)
			return $realip;
		if (isset ( $_SERVER )) {
			if (isset ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
				$arr = explode ( ',', $_SERVER ['HTTP_X_FORWARDED_FOR'] );
				foreach ( $arr as $ip ) {
					$ip = trim ( $ip );
					if ($ip != 'unknown') {
						$realip = $ip;
						break;
					}
				}
			} elseif (isset ( $_SERVER ['HTTP_CLIENT_IP'] )) {
				$realip = $_SERVER ['HTTP_CLIENT_IP'];
			} else {
				if (isset ( $_SERVER ['REMOTE_ADDR'] )) {
					$realip = $_SERVER ['REMOTE_ADDR'];
				} else {
					$realip = '0.0.0.0';
				}
			}
		} else {
			if (getenv ( 'HTTP_X_FORWARDED_FOR' )) {
				$realip = getenv ( 'HTTP_X_FORWARDED_FOR' );
			} elseif (getenv ( 'HTTP_CLIENT_IP' )) {
				$realip = getenv ( 'HTTP_CLIENT_IP' );
			} else {
				$realip = getenv ( 'REMOTE_ADDR' );
			}
		}
		preg_match ( '/[\d\.]{7,15}/', $realip, $onlineip );
		$realip = ! empty ( $onlineip [0] ) ? $onlineip [0] : '0.0.0.0';
		return $realip;
	}
	
	/**
	 * ���� Smarty ģ��
	 *
	 * @param string $html        	
	 * @return null;
	 */
	static public function display() {
		global $tpl;
		$html = null;
		$htmlArr = explode ( '/', $_SERVER [SCRIPT_NAME] );
		$html = str_ireplace ( '.php', '.html', $htmlArr [count ( $htmlArr ) - 1] );
		$dir = dirname ( $_SERVER [SCRIPT_NAME] );
		$firstStr = substr ( $dir, 0, 1 );
		$endStr = substr ( $dir, strlen ( $dir ) - 1, 1 );
		if ($firstStr == '/' || $firstStr == '\\')
			$dir = substr ( $dir, 1 );
		if ($endStr != '/' || $endStr != '\\')
			$dir = $dir . '/';
		$tpl->display ( $dir . $html );
	}
	
	/**
	 * ����Ŀ¼
	 *
	 * @param string $dir        	
	 */
	static public function createDir($dir) {
		if (! is_dir ( $dir )) {
			mkdir ( $dir, 0777 );
		}
	}
	
	/**
	 * �����ļ���Ĭ��Ϊ�գ�
	 *
	 * @param unknown_type $filename        	
	 */
	static public function createFile($filename) {
		if (! is_file ( $filename ))
			touch ( $filename );
	}
	
	/**
	 * ��ȷ��ȡ����
	 *
	 * @param string $param        	
	 * @param string $type        	
	 * @return string
	 */
	static public function getData($param, $type = 'post') {
		$type = strtolower ( $type );
		if ($type == 'post') {
			return Tool::mysqlString ( trim ( $_POST [$param] ) );
		} elseif ($type == 'get') {
			return Tool::mysqlString ( trim ( $_GET [$param] ) );
		}
	}
	
	/**
	 * ɾ���ļ�
	 *
	 * @param string $filename        	
	 */
	static public function delFile($filename) {
		if (file_exists ( $filename ))
			unlink ( $filename );
	}
	
	/**
	 * ɾ��Ŀ¼
	 *
	 * @param string $path        	
	 */
	static public function delDir($path) {
		if (is_dir ( $path ))
			rmdir ( $path );
	}
	
	/**
	 * ɾ��Ŀ¼�����µ�ȫ���ļ�
	 *
	 * @param string $dir        	
	 * @return bool
	 */
	static public function delDirOfAll($dir) {
		// ��ɾ��Ŀ¼�µ��ļ���
		if (is_dir ( $dir )) {
			$dh = opendir ( $dir );
			while ( ! ! $file = readdir ( $dh ) ) {
				if ($file != "." && $file != "..") {
					$fullpath = $dir . "/" . $file;
					if (! is_dir ( $fullpath )) {
						unlink ( $fullpath );
					} else {
						self::delDirOfAll ( $fullpath );
					}
				}
			}
			closedir ( $dh );
			// ɾ����ǰ�ļ��У�
			if (rmdir ( $dir )) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	/**
	 * ��֤��½
	 */
	static public function validateLogin() {
		if (empty ( $_SESSION ['admin'] ['user'] ))
			header ( 'Location:/admin/' );
	}
	
	/**
	 * ���Ѿ����ڵ�ͼƬ���ˮӡ
	 *
	 * @param string $file_path        	
	 * @return bool
	 */
	static public function addMark($file_path) {
		if (file_exists ( $file_path ) && file_exists ( MARK )) {
			// ����ϴ�ͼƬ�����ƺ�׺
			$ext_name = strtolower ( substr ( $file_path, strrpos ( $file_path, '.' ), strlen ( $file_path ) ) );
			// $new_name='jzy_' . time() . rand(1000,9999) . $ext_name ;
			$store_path = ROOT_PATH . UPDIR;
			// ���ϴ�ͼƬ�߿�
			$imginfo = getimagesize ( $file_path );
			$width = $imginfo [0];
			$height = $imginfo [1];
			// ���ͼƬˮӡ
			switch ($ext_name) {
				case '.gif' :
					$dst_im = imagecreatefromgif ( $file_path );
					break;
				case '.jpg' :
					$dst_im = imagecreatefromjpeg ( $file_path );
					break;
				case '.png' :
					$dst_im = imagecreatefrompng ( $file_path );
					break;
			}
			$src_im = imagecreatefrompng ( MARK );
			// ��ˮӡͼƬ�߿�
			$src_imginfo = getimagesize ( MARK );
			$src_width = $src_imginfo [0];
			$src_height = $src_imginfo [1];
			// ���ˮӡͼƬ��ʵ������λ��
			$src_x = $width - $src_width - 10;
			$src_y = $height - $src_height - 10;
			// �½�һ�����ɫͼ��
			$nimage = imagecreatetruecolor ( $width, $height );
			// �����ϴ�ͼƬ�����ͼ��
			imagecopy ( $nimage, $dst_im, 0, 0, 0, 0, $width, $height );
			// ������λ�ÿ���ˮӡͼƬ�����ͼ����
			imagecopy ( $nimage, $src_im, $src_x, $src_y, 0, 0, $src_width, $src_height );
			// �����������ɺ��ˮӡͼƬ
			switch ($ext_name) {
				case '.gif' :
					imagegif ( $nimage, $file_path );
					break;
				case '.jpg' :
					imagejpeg ( $nimage, $file_path );
					break;
				case '.png' :
					imagepng ( $nimage, $file_path );
					break;
			}
			// �ͷ���Դ
			imagedestroy ( $dst_im );
			imagedestroy ( $src_im );
			unset ( $imginfo );
			unset ( $src_imginfo );
			// �ƶ����ɺ��ͼƬ
			@move_uploaded_file ( $file_path, ROOT_PATH . UPDIR . $file_path );
		}
	}
	
	/**
	 * ���Ľ�ȡ2�����ֽڽ�ȡģʽ
	 *
	 * @access public
	 * @param string $str
	 *        	��Ҫ��ȡ���ַ���
	 * @param int $slen
	 *        	��ȡ�ĳ���
	 * @param int $startdd
	 *        	��ʼ��Ǵ�
	 * @return string
	 */
	static public function cn_substr($str, $slen, $startdd = 0) {
		$cfg_soft_lang = PAGECHARSET;
		if ($cfg_soft_lang == 'utf-8') {
			return self::cn_substr_utf8 ( $str, $slen, $startdd );
		}
		$restr = '';
		$c = '';
		$str_len = strlen ( $str );
		if ($str_len < $startdd + 1) {
			return '';
		}
		if ($str_len < $startdd + $slen || $slen == 0) {
			$slen = $str_len - $startdd;
		}
		$enddd = $startdd + $slen - 1;
		for($i = 0; $i < $str_len; $i ++) {
			if ($startdd == 0) {
				$restr .= $c;
			} elseif ($i > $startdd) {
				$restr .= $c;
			}
			if (ord ( $str [$i] ) > 0x80) {
				if ($str_len > $i + 1) {
					$c = $str [$i] . $str [$i + 1];
				}
				$i ++;
			} else {
				$c = $str [$i];
			}
			if ($i >= $enddd) {
				if (strlen ( $restr ) + strlen ( $c ) > $slen) {
					break;
				} else {
					$restr .= $c;
					break;
				}
			}
		}
		return $restr;
	}
	
	/**
	 * utf-8���Ľ�ȡ�����ֽڽ�ȡģʽ
	 *
	 * @access public
	 * @param string $str
	 *        	��Ҫ��ȡ���ַ���
	 * @param int $slen
	 *        	��ȡ�ĳ���
	 * @param int $startdd
	 *        	��ʼ��Ǵ�
	 * @return string
	 */
	static public function cn_substr_utf8($str, $length, $start = 0) {
		if (strlen ( $str ) < $start + 1) {
			return '';
		}
		preg_match_all ( "/./su", $str, $ar );
		$str = '';
		$tstr = '';
		// Ϊ�˼���mysql4.1���°汾,�����ݿ�varcharһ��,����ʹ�ð��ֽڽ�ȡ
		for($i = 0; isset ( $ar [0] [$i] ); $i ++) {
			if (strlen ( $tstr ) < $start) {
				$tstr .= $ar [0] [$i];
			} else {
				if (strlen ( $str ) < $length + strlen ( $ar [0] [$i] )) {
					$str .= $ar [0] [$i];
				} else {
					break;
				}
			}
		}
		return $str;
	}
	
	/**
	 * ɾ��ͼƬ������ͼƬID
	 *
	 * @param int $image_id        	
	 */
	static function delPicByImageId($image_id) {
		$db_name = PREFIX . 'images i';
		$m = new Model ();
		$data = $m->getOne ( $db_name, "i.id={$image_id}", "i.path as p, i.big_img as b, i.small_img as s" );
		foreach ( $data as $v ) {
			@self::delFile ( ROOT_PATH . $v ['p'] );
			@self::delFile ( ROOT_PATH . $v ['b'] );
			@self::delFile ( ROOT_PATH . $v ['s'] );
		}
		$m->del ( PREFIX . 'images', "id={$image_id}" );
		unset ( $m );
	}
	
	/**
	 * ͼƬ�ȱ�������
	 *
	 * @param resource $im
	 *        	�½�ͼƬ��Դ(imagecreatefromjpeg/imagecreatefrompng/imagecreatefromgif)
	 * @param int $maxwidth
	 *        	����ͼ���
	 * @param int $maxheight
	 *        	����ͼ���
	 * @param string $name
	 *        	����ͼ������
	 * @param string $filetype�ļ�����(.jpg/.gif/.png)        	
	 */
	static public function resizeImage($im, $maxwidth, $maxheight, $name, $filetype) {
		$pic_width = imagesx ( $im );
		$pic_height = imagesy ( $im );
		if (($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
			if ($maxwidth && $pic_width > $maxwidth) {
				$widthratio = $maxwidth / $pic_width;
				$resizewidth_tag = true;
			}
			if ($maxheight && $pic_height > $maxheight) {
				$heightratio = $maxheight / $pic_height;
				$resizeheight_tag = true;
			}
			if ($resizewidth_tag && $resizeheight_tag) {
				if ($widthratio < $heightratio)
					$ratio = $widthratio;
				else
					$ratio = $heightratio;
			}
			if ($resizewidth_tag && ! $resizeheight_tag)
				$ratio = $widthratio;
			if ($resizeheight_tag && ! $resizewidth_tag)
				$ratio = $heightratio;
			$newwidth = $pic_width * $ratio;
			$newheight = $pic_height * $ratio;
			if (function_exists ( "imagecopyresampled" )) {
				$newim = imagecreatetruecolor ( $newwidth, $newheight );
				imagecopyresampled ( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height );
			} else {
				$newim = imagecreate ( $newwidth, $newheight );
				imagecopyresized ( $newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height );
			}
			$name = $name . $filetype;
			imagejpeg ( $newim, $name );
			imagedestroy ( $newim );
		} else {
			$name = $name . $filetype;
			imagejpeg ( $im, $name );
		}
	}
	
	/**
	 * �����ļ�
	 *
	 * @param string $file_path
	 *        	����·��
	 */
	static public function downFile($file_path) {
		// �ж��ļ��Ƿ����
		$file_path = iconv ( 'utf-8', 'gb2312', $file_path ); // �Կ��ܳ��ֵ��������ƽ���ת��
		if (! file_exists ( $file_path )) {
			exit ( '�ļ������ڣ�' );
		}
		$file_name = basename ( $file_path ); // ��ȡ�ļ�����
		$file_size = filesize ( $file_path ); // ��ȡ�ļ���С
		$fp = fopen ( $file_path, 'r' ); // ��ֻ���ķ�ʽ���ļ�
		header ( "Content-type: application/octet-stream" );
		header ( "Accept-Ranges: bytes" );
		header ( "Accept-Length: {$file_size}" );
		header ( "Content-Disposition: attachment;filename={$file_name}" );
		$buffer = 1024;
		$file_count = 0;
		// �ж��ļ��Ƿ����
		while ( ! feof ( $fp ) && ($file_size - $file_count > 0) ) {
			$file_data = fread ( $fp, $buffer );
			$file_count += $buffer;
			echo $file_data;
		}
		fclose ( $fp ); // �ر��ļ�
	}
}
?>