window.onload = function() {
	index = 1;          //表示显示的页面编号
	thePan = true;  //在页面下滑已经每个也页面动画播放时滚动滑轮事件返回是空
	var form = document.getElementById('form');
	var mainOverview = document.getElementById('mainOverview');
	var showFormList = form.getElementsByTagName('li');
	//通过循环监听点击事件
	for (var i = 0; i < showFormList.length; i++) {
		showFormList[i].onclick = function() {
			if(this.className == 'gray') {
				
				return;
			}
			var myindex = parseInt(this.getAttribute('index'));
			var offset = -880 * (myindex - index);
			animate(offset);
			index = myindex;
			showButton();
		}
	}
}

//图标点亮以及页面动画的放映和停止
function showButton() {
	var mainArr = giveMain();
	var form = document.getElementById('form');
	var showFormList = form.getElementsByTagName('li');
	for (var i = 0; i < showFormList.length; i++) {
		if(showFormList[i].className == 'gray') {
			showFormList[i].className = '';
			stopAnimate(i);
			break;
		}
	}

	function stopAnimate(i) {
		if(i==0 || i==1) {
			mainArr[i].getElementsByClassName('content')[0].className ='content';
			mainArr[i].getElementsByTagName('figure')[0].className = '';		
		}
		else if(i==2) {
			var photoLeftArr = mainArr[i].getElementsByClassName('photo-left-view')[0].getElementsByTagName('li');
			var ptotoRightArr = mainArr[i].getElementsByClassName('photo-right-view')[0].getElementsByTagName('li');
			for (var i = 0; i < photoLeftArr.length; i++) {
				if(photoLeftArr[i].className.indexOf('activeing')>=0) {
					photoLeftArr[i].className = photoLeftArr[i].className.replace('activeing','');
					break;
				}
			}
			for (var i = 0; i < ptotoRightArr.length; i++) {
				if(ptotoRightArr[i].className.indexOf('activeing')>=0) {
					ptotoRightArr[i].className = ptotoRightArr[i].className.replace('activeing','');
					break;
				}
			}
		}
		else if(i==3) {
			var liArr = mainArr[i].getElementsByTagName('li');
			mainArr[i].getElementsByClassName('content')[0].className ='content';
			for (var i = 0; i < liArr.length; i++) {
				liArr[i].className=liArr[i].className.replace('fourUlLi','');
			}
		}
	}

	function playAnimate(indexs) {
		if(indexs==0) {
			bianhua();
			mainArr[indexs].getElementsByTagName('figure')[0].className = 'figureone';
			thePan = false;
			setTimeout(function() {
				thePan=true;
			},2000);	

		}
		else if(indexs==1) {
			bianhua();
			mainArr[indexs].getElementsByTagName('figure')[0].className = 'figuretwo';
			thePan = false;
			setTimeout(function() {
				thePan=true;
			},3000);	
		}
		else if(indexs==2) {
			var colorArr= mainArr[indexs].getElementsByClassName('switch-color')[0].getElementsByTagName('li');
			var photoLeftArr = mainArr[indexs].getElementsByClassName('photo-left-view')[0].getElementsByTagName('li');
			var ptotoRightArr = mainArr[indexs].getElementsByClassName('photo-right-view')[0].getElementsByTagName('li');
			photoLeftArr[0].className+=' activeing';
			ptotoRightArr[0].className+=' activeing';
			for (var i = 0; i < colorArr.length; i++) {
				(function(e){
					colorArr[e].onclick = function() {
						for (var n = 0; n < photoLeftArr.length; n++) {
							if(photoLeftArr[n].className.indexOf('activeing')>=0) {
								photoLeftArr[n].className=photoLeftArr[n].className.replace('activeing','');
								break;
							}
						}
						for (var m = 0; m < ptotoRightArr.length; m++) {
							if(ptotoRightArr[m].className.indexOf('activeing')>=0) {
								ptotoRightArr[m].className=ptotoRightArr[m].className.replace('activeing','');
								break;
							}
						}
						photoLeftArr[e].className+=' ' + 'activeing';
						ptotoRightArr[e].className+=' '+'activeing';
					}

				})(i)
			}
			thePan = false;
			setTimeout(function() {
				thePan=true;
			},3000);	
		}
		else if(indexs==3) {
			bianhua();
			var liArr = mainArr[indexs].getElementsByTagName('li');
			for (var i = 0; i < liArr.length; i++) {
				liArr[i].className+=' '+'fourUlLi';
			}
			thePan = false;
			setTimeout(function() {
				thePan=true;
			},3000);	
		}

		function bianhua() {
			mainArr[indexs].getElementsByClassName('content')[0].className ='content contents';
		}
	}
	showFormList[index - 1].className = 'gray';
	playAnimate(index-1);
	returnTop(index-1);
}

//返回顶部按钮
function returnTop(indextop) {
	var mainOverview = document.getElementById('mainOverview');
	var backTop = document.getElementsByClassName('back-top')[0];
	if(parseInt(mainOverview.style.top)<-870) {
		backTop.style.display = 'block';
	}
	else {
		backTop.style.display='none';
	}
	backTop.onclick = function() {
		var top = indextop*860;
		animate(top);
		index = 1;
		showButton();
		backTop.style.display='none';
	}
}

//div移动方法
function animate(offset) {
	var form = document.getElementById('form');
	var mainOverview = document.getElementById('mainOverview');
	var showFormList = form.getElementsByTagName('li');
	var newTop =  parseInt(mainOverview.style.top) + parseInt(offset);
	var time = 300; //位移总的时间
	var interval = 10; //位移间隔时间
	var speed = offset/(time/interval); //每次的位移量
	function go() {
		if((speed<0&&parseInt(mainOverview.style.top)>newTop)||(speed>0&&parseInt(mainOverview.style.top)<newTop)) {
			mainOverview.style.top = parseInt(mainOverview.style.top) + speed + 'px';
			setTimeout(go, interval);
			thePan = false;
			mainOverview.style.transition = 'top '+1+'s ease';
		}
		else {
			mainOverview.style.top = newTop + 'px';
			if(newTop<-2580) {
				newTop = -2580;
			}
			if(newTop>0) {
				newTop = 0;
			}
		}
	}
	go();
}

//滚动滑轮事件
document.onmousewheel = function(event) {
	var headerOne = document.getElementById('headerOne');
	var headerTwo = document.getElementById('headerTwo');
		
	if (thePan) { //当thePan为true时也页面才会下滑
		var up = isWheelUp(event);
		isHeaderwheel(up);
	}
	else {
		return false;
	}		
}

//滑动判断及表头变化
function isHeaderwheel(up) {
	var mainOverview = document.getElementById('mainOverview');
	var headerOne = document.getElementById('headerOne');
	var headerTwo = document.getElementById('headerTwo');
	var headerTwoNav = document.getElementById('headerTwoNav');
	var form = document.getElementById('form');
	if (up) {
		if(parseInt(mainOverview.style.top) >= 0) {
			headerOne.style.display = 'block';
			headerTwoNav.className = 'desktop-nav';
			mainOverview.style.top = 0 + 'px';
			form.style.display = 'none';
		}
		else {
			if(index == 1) {
				index = 1;
			}
			else {
				index-=1;
			}		
			animate(860);
			showButton();
		}
	}
	else {
		if(parseInt(mainOverview.style.top) <= -2580) {
			mainOverview.style.top = -2580 +'px';
		}
		else {
			headerOne.style.display = 'none';
			headerTwoNav.className = 'desktop-nav active';
			form.style.display = 'block';
			if(index==4) {
				index = 4;
			}
			else {
				index+=1;
			}
			animate(-860);
			showButton();			
		}
	}
}

//判断滑轮滚动方向
var isWheelUp = function(event) {
	event = event || window.event;
	var isWheelUp = true;
	if(event.wheelDelta) { //IE/Opera/Chrome
		//向上滚动是true,向下滚动是false
		isWheelUp = event.wheelDelta / 120 == 1 ? true : false;
	}
	else {  //Firefox
		isWheelUp = event.detail / 3 == 1 ? true : false;
	}
	return isWheelUp;
}

//获得四个div块
function giveMain() {
	var mainOverview = document.getElementById('mainOverview');
	var mainOverviewList = mainOverview.getElementsByTagName('div');
	var mainArr = new Array();
	var conArr = new Array();
	for (var i = 0; i < mainOverviewList.length; i++) {
		if(mainOverviewList[i].className == 'main-section') {
			mainArr.push(mainOverviewList[i]);
		}
	}
	return mainArr;
}



