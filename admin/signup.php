<?php include 'common/header.php'?>
	<style type="text/css" media="all">
		.label LABEL { width: 100px; float: left;}
	
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
	<title>注册</title>
</head>
<body>
	<div id="win">
		<form id="form" action="welcome.php?>" method="post">
			<div class="label">
				<label>用户名: </label><input id="name" name="name" />
			</div>
			<div class="label">
				<label>密码: </label><input id="password" name="password" />
			</div>
			<div class="label">
				<label>E-mail: </label><input id="email" name="email" />
			</div>
			<div class="label">
				<label>生日: </label><input id="birthday" name="birthday" />
			</div>
			<div class="label">
				<label>备注: </label>
				<textarea name="comment" rows="5" cols="40"
					class="easyui-validatebox"></textarea>
			</div>
			<div class="label">
				<label>性别: </label> <input type="radio" name="gender" value="male" class="easyui-validatebox" />男 
				<input type="radio" name="gender" value="female" class="easyui-validatebox" />女
			</div>
			<div style="text-align: center; padding: 5px">
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">提交</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">清除</a>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript" src="js/signup.js"></script>
</html>