// 用于用户登陆和注册
function click() {
	var navUser = document.getElementById('navUser');
	var popUpBox = document.getElementById('popUpBox');
	navUser.onclick = function() {
		popUpBox.style.display = 'block';
		popBox(popUpBox);
	}
}
click();

//用户登录
function popBox(popUpBox) {
	// var enterButton = popUpBox.getElementsByClassName('btn')[0];
	var enterButton = document.getElementById('popUpBoxBtn');
	// var rigisterCloud = popUpBox.getElementsByClassName('rigistercloud')[0];
	var rigisterCloud = document.getElementById('rigisterCloud');
	var popUpBoxFork = document.getElementById('popUpBoxFork');
	enterButton.onclick = function() {
		// var userName = popUpBox.getElementsByClassName('username')[0].getElementsByTagName('input')[0].value; //账号
		var userName = document.getElementById('userNameText').value;
		// var passWord = popUpBox.getElementsByClassName('password')[0].getElementsByTagName('input')[0].value; //密码
		var passWord = document.getElementById('passWordText').value;
		if(userName=='') {
			var emptyUser  =document.getElementById('emptyUser');
			styleDisOP(emptyUser);
		}
		else if(passWord=='') {
			var emptyPassword  = document.getElementById('emptyPassword');
			styleDisOP(emptyPassword);
		}
		else {  //若内容都不为空
			if(userName.indexOf('@')>=0){  //判断账号输入是否为邮箱。
				var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
				if(reg.test(userName)) { //账号邮箱格式正确
					//检测localStorage中是否存在
				}
				else {
					alert('账号格式错误');
				}
			}
			else {       //账号输入不是邮箱
				if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(userName))) {  //账号输入不是手机号格式
			 		var mistakeUser  =document.getElementById('mistakeUser');
			 		styleDisOP(mistakeUser);
			 	}else {   //账号手机格式正确
			 		for (var i = 0; i < localStorage.length; i++) {
			 			if(localStorage.key(i)==userName) {  //判断手机号是否存在	
			 				var str = localStorage.getItem(userName);
			 				var site = JSON.parse(str);
			 				//eval()
			 				if(passWord==site.userpassWordRepeat) {       //账号密码正确
			 					popUpBox.style.display = 'none';
			 					var navUser = document.getElementById('navUser');
			 					navUser.getElementsByTagName('a')[0].className = 'nav-user-a';
			 				}
			 				else {                //密码错误
			 						var mistakePassword = document.getElementById('mistakePassword');
			 						styleDisOP(mistakePassword);
			 				}
			 				break;
			 			}
			 			if(i==(localStorage.length-1)) {         //账号不存在
			 				var inexistenceUser = document.getElementById('inexistenceUser');
			 				styleDisOP(inexistenceUser);
			 			}
			 		}
			 	}
			}
		} 
	}
	rigisterCloud.onclick = function() {
		var Dialog = document.getElementById('Dialog');
		popUpBox.style.display = 'none';
		Dialog.style.display = 'block';
		registerUser(Dialog);
	}
	popUpBoxFork.onclick = function() {
		popUpBox.style.display = 'none';
	}
}

 //注册用户
function registerUser(Dialog) {  
	// var registerButton = Dialog.getElementsByClassName('btn')[0];
	var registerButton = document.getElementById('DiaBtn');
	var dialogFork = document.getElementById('dialogFork');
	registerButton.onclick = function() {
		// var userName = Dialog.getElementsByClassName('username')[0].getElementsByTagName('input')[0].value;
		var userName = document.getElementById('diaUserNameText').value;
		// var mail = Dialog.getElementsByClassName('mail')[0].getElementsByTagName('input')[0].value;
		var mail = document.getElementById('diaMailText').value;
		// var passWord = Dialog.getElementsByClassName('password')[0].getElementsByTagName('input')[0].value;
		var passWord = document.getElementById('diaPassWordText').value;
		// var passWordRepeat = Dialog.getElementsByClassName('password-repeat')[0].getElementsByTagName('input')[0].value;
		var passWordRepeat = document.getElementById('diaRepeatPassWord').value;
		if(userName=='') {
			var diaemptyUser = document.getElementById('diaemptyUser');
			styleDisOP(diaemptyUser);
		}
		else if(mail=='') {
			var diaemptyMail = document.getElementById('diaemptyMail');
			styleDisOP(diaemptyMail);
		}
		else if(passWord=='') {
			var diaemptyPassword = document.getElementById('diaemptyPassword');
			styleDisOP(diaemptyPassword);
		}
		else if(passWordRepeat=='') {
			var diaemptyPasswordRepeat = document.getElementById('diaemptyPasswordRepeat');
			styleDisOP(diaemptyPasswordRepeat);
		}
		else {        //信息填满
			if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(userName))) { //手机号格式不正确
				var diamistakeUser = document.getElementById('diamistakeUser');
				styleDisOP(diamistakeUser);
			}
			else {                  //手机号格式正确
				var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
				if(!reg.test(mail)) {   //邮箱格式不正确
					var diamistakeMail = document.getElementById('diamistakeMail');
					styleDisOP(diamistakeMail);
				}
				else {              //邮箱格式正确
					if(passWord == passWordRepeat) { //密码输入一致
						
						for (var i = 0; i < localStorage.length; i++) {        //判断手机号是否存在
							if(localStorage.key(i)==userName) {   //手机号已经被注册
								var diaexistUser = document.getElementById('diaexistUser');
								styleDisOP(diaexistUser);
								break;
							}
							if(i == (localStorage.length-1)) {
								save(userName,mail,passWordRepeat);  //存入页面中
							}
						}
					}
					else {                    //密码输入不一致
						var diamistakePasswordRepeat = document.getElementById('diamistakePasswordRepeat');
						styleDisOP(diamistakePasswordRepeat);
					}
				}
			}				
		}
	}

	dialogFork.onclick = function() {
		Dialog.style.display = 'none';
	}
}

//存储用户
function save(userName,mail,passWordRepeat) {
	var user = new Object;
	user.username = userName;
	user.usermail = mail;
	user.userpassWordRepeat = passWordRepeat;
	 var userStr = JSON.stringify(user);   // 将对象转换为字符串
	localStorage.setItem(user.username,userStr);
	for (var i = 0; i < localStorage.length; i++) {
		if(localStorage.key(i)==userName) {
			alert('保存成功');
			break;
		}
		if(i==localStorage.length-1) {
			alert('保存失败');
		}
	}
	
}

//弹出框中信息提示
function styleDisOP(obj) {
	obj.style.display = 'block';
	obj.style.opacity = 1;
}

//文本框获得焦点执行
function keywordfocus(inputt) {
	var divInput = inputt.parentNode;   //获得父级
	var labelSpan = divInput.getElementsByTagName('span');
	for (var i = 0; i < labelSpan.length; i++) {
		if((labelSpan[i].className=='formli-input-warning')&&(labelSpan[i].style.display=='block')) {
			labelSpan[i].style.display = 'none';
			labelSpan[i].style.opacity = 0;
		}
		else if(labelSpan[i].className=='formli-input-placeholder') {
			labelSpan[i].style.display = 'none';
		}
	}
}

//文本框失去焦点时执行
function keywordblur(inputt) {
	var divInput = inputt.parentNode;   //获得父级
	var labelSpan = divInput.getElementsByTagName('span');
	for (var i = 0; i < labelSpan.length; i++) {
		if(labelSpan[i].className=='formli-input-placeholder') {
			labelSpan[i].style.display = 'block';
			break;
		}
	}
}

//弹出框失去焦点时关闭
// function stop(obj) {
// 	obj.style.display = 'none';
// }