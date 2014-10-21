<html>

<?php
session_start ();
// store session data
$_SESSION ['views'] = 1;
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	if (empty ( $_POST ["name"] )) {
		$nameErr = "Name is required";
	} else {
		$name = test_input ( $_POST ["name"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $name )) {
			$nameErr = "只允许字母和空格！";
		}
	}
	
	if (empty ( $_POST ["email"] )) {
		$emailErr = "Email is required";
	} else {
		$email = test_input ( $_POST ["email"] );
		if (! preg_match ( "/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email )) {
			$emailErr = "无效的 email 格式！";
		}
	}
	
	if (empty ( $_POST ["website"] )) {
		$website = "";
	} else {
		$website = test_input ( $_POST ["website"] );
		if (! preg_match ( "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website )) {
			$websiteErr = "无效的 URL";
		}
	}
	
	if (empty ( $_POST ["comment"] )) {
		$comment = "";
	} else {
		$comment = test_input ( $_POST ["comment"] );
	}
	
	if (empty ( $_POST ["gender"] )) {
		$genderErr = "Gender is required";
	} else {
		$gender = test_input ( $_POST ["gender"] );
	}
}
?>
<body>
	<div class="menu">
		<?php include '_header.php';?>
	</div>
	<form method="post" action="upload_file.php"
		enctype="multipart/form-data">

		Name: <input type="text" name="name" value="<?php echo $name;?>">

		E-mail: <input type="text" name="email" value="<?php echo $email;?>">

		Website: <input type="text" name="website"
			value="<?php echo $website;?>"> Comment:
		<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

		Gender: <input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="female") echo "checked";?>
			value="female">Female <input type="radio" name="gender"
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			value="male">Male <input type="file" name="file" id="file" /> <input
			type="submit" name="submit" value="Submit">

	</form>
<?php

include '_footer.php';
// $myfile = fopen ( "1.txt", "r" ) or die ( "Unable to open file!" );
// 输出单行直到 end-of-file
// while ( ! feof ( $myfile ) ) {
// echo fgets ( $myfile ) . "<br>";
// }
// fclose ( $myfile );

// setcookie ( "user", "Alex Porter", time () + 3600 );

// Print a cookie
// echo $_COOKIE ["user"];

// A way to view all cookies
// print_r ( $_COOKIE );
// setcookie("user", "", time()-3600);

echo "Pageviews=" . $_SESSION ['views'];
session_destroy ();

include 'sent.php';
SendMail ( "371980755@qq.com", "邮件标题", "邮件正文" );

?>
</body>
</html>