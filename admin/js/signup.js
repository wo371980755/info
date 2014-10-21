//$.fn.datebox.defaults.formatter = function(date) {
//	var y = date.getFullYear();
//	var m = date.getMonth() + 1;
//	var d = date.getDate();
//	return y + '-' + m + '-' + d;
//}

$('#win').window({
	width : 500,
	height : 300,
	modal : true,
	closable : false,
	collapsible : false,
	minimizable : false,
	maximizable : false,
	draggable : false,
	title : "注册"
});

$('#name').validatebox({
	required : true,
	validType : 'length[6,20]'
});

$('#password').validatebox({
	required : true,
	validType : 'length[6,20]'
});

$('#email').validatebox({
	required : true,
	validType : 'email',
});

$('#birthday').datebox({
	required : true,
	editable : false
});