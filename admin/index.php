<?php include 'common/header.php' ?>
	<style type="text/css" media="all">
		.label LABEL { width: 100px; float : left;}
		.error { color: red;}
	</style>
	<script>
		function submitForm(){
			$('#form').form('submit');
		}
		function clearForm(){
			$('#form').form('clear');
		}
	</script>
<title>Signup</title>
</head>
<?php
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	if (empty ( $_POST ["name"] )) {
		$nameErr = "Name is required";
	} else {
		$name = test_input ( $_POST ["name"] );
	}
	
	if (empty ( $_POST ["email"] )) {
		$emailErr = "Email is required";
	} else {
		$email = test_input ( $_POST ["email"] );
	}
	
	if (empty ( $_POST ["website"] )) {
		$website = "";
	} else {
		$website = test_input ( $_POST ["website"] );
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
	<h2>Signup</h2>
	<div class="demo-info">
		<div class="demo-tip icon-tip"></div>
		<div>Using layout on window.</div>
	</div>
	<div style="margin:10px 0;">
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#w').window('open')">Open</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#w').window('close')">Close</a>
	</div>
	<div id="w" class="easyui-window" title="signup" data-options="iconCls:'icon-save',modal:true,closable : false,collapsible : false, minimizable: false, maximizable : false" style="width:500px;height:300px;padding:5px;">
		<form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="label">
			<label>Name: </label><input class="easyui-validatebox" type="text" name="name" data-options="required:true"></input>
		</div>
		<div class="label">
			<label>Password: </label><input class="easyui-validatebox" type="text" name="password" data-options="required:true,validType:'length[6,12]'"></input>
		</div>
		<div class="label">
			<label>E-mail: </label><input class="easyui-validatebox" type="text" name="email" data-options="required:true,validType:'email'"></span>
		</div>
		<div class="label">
			<label>Birthday: </label><input class="easyui-datebox" type="text" name="birthday" data-options="editable:false" /> 
		</div>
		<div class="label">
			<label>Comment: </label>
			<textarea name="comment" rows="5" cols="40"></textarea>
		</div>
		<div class="label">
			<label>Gender: </label>
			<input type="radio" name="gender" value="female">Female 
			<input type="radio" name="gender" value="male">Male <span class="error">* <?php echo $genderErr;?></span>
		</div>
		<div style="text-align:center;padding:5px">
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Submit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
		</div>
	</form>
	</div>
</body>

</html>