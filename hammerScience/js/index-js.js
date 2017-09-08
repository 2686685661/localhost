window.onload = function() {
	palySlider();		
	showPhoto('second-child','navpanel');
	waterfallResultEffect('hotwrapper','boxes');
}

//鼠标经过手机时出现下拉框
function showPhoto(child,panel) {
	var second = document.getElementById(child);
	var navPanel = document.getElementById(panel);
	var timer;
	var timers;
	function navActive() {
		navPanel.style.opacity = 1;
		navpanel.style.visibility = 'visible';
		navPanel.style.transition = 'opacity .' + 8 + 's ease-out';
	}
	function navMove() {
		navPanel.style.opacity = 0;
		navpanel.style.visibility = 'hidden';
		navPanel.style.transition = 'opacity .' + 8 + 's ease-out';
	}
	second.onmouseover = function() {
		navActive();
	}
	second.onmouseout = function() {
		timer = setTimeout(navMove(),500);
		// navMove();		
	}
	navPanel.onmouseover = function() {
		timers=setTimeout(navActive(),520);	
	}
	navPanel.onmouseout = function() {
		navMove();
	}
}

//瀑布流
function waterfallResultEffect(parentes,boxe) {
	
	waterfall(parentes,boxe);

	function waterfall(parent,box) {
		var hotWrapper = document.getElementById(parent);
		var oBoxs = getByClass(hotWrapper,box);
		var oBoxW = oBoxs[0].offsetWidth;
		var cols = Math.floor(hotWrapper.clientWidth/oBoxW);
		hotWrapper.style.cssText = 'width:' + oBoxW*cols + 'px;margin:0px auto';
		var hArr = [];
		for (var i = 0; i < oBoxs.length; i++) {
			if(i < cols) {
				hArr.push(oBoxs[i].offsetHeight);
			}
			else {
				var minH = Math.min.apply(null,hArr);   //应用某一对象的一个方法，用另一个对象替换当前对象。 
				var index = getMinhIndex(hArr,minH);
				oBoxs[i].style.position = 'absolute';
				oBoxs[i].style.top = minH + 'px';
				oBoxs[i].style.left = oBoxW * index + 'px';
				hArr[index] += oBoxs[i].offsetHeight;
			}
		}
	}

	//当滚动条滚动时进行判断
	window.onscroll = function() {
		var hotWrapper = document.getElementById('hotwrapper');
		// alert(hotWrapper.className);
		// debugger;
		var dataInt = {"data":[{"src":'ix-ab.jpg'},{"src":'ix-ai.jpg'},{"src":'ix-ah.jpg'}]};
		if(checkScrollSlide){
			for (var i = 0; i < dataInt.data.length; i++) {
				var oBox = document.createElement('div');
				oBox.className = 'boxes';
				hotWrapper.appendChild(oBox);

				var oPic = document.createElement('div');
				oPic.className = 'pic';
				oBox.appendChild(oPic);

				var oPicImg = document.createElement('div');
				oPicImg.className = 'pic-imbox';
				oPic.appendChild(oPicImg);

				var oImg = document.createElement('img');
				oImg.src = 'images/' + dataInt.data[i].src;
				oPicImg.appendChild(oImg);

				var oInfo = document.createElement('div');
				oInfo.className = 'info';
				oPic.appendChild(oInfo);

				var oHSix = document.createElement('h6');
				oHSix.innerHTML = 'aaaaaaaaa';
				oInfo.appendChild(oHSix);

				var oInP = document.createElement('p');
				oInP.innerHTML = 'bbb';
				oInfo.appendChild(oInP);

				var oPicP = document.createElement('p');
				oPicP.className = 'price';
				oPic.appendChild(oPicP);

				var oPiPI = document.createElement('i');
				oPiPI.innerHTML = '¥';
				oPicP.appendChild(oPiPI);

				var PiPSpan = document.createElement('span');
				PiPSpan.innerHTML = 'ccc';
				oPicP.appendChild(PiPSpan);

				var oPicDiv = document.createElement('div');
				oPicDiv.className = 'hot-pic-operator';
				oPic.appendChild(oPicDiv);

				var oPDSO = document.createElement('span');
				oPDSO.className = 'operator-btn';
				oPicDiv.appendChild(oPDSO);

				var oPDSOA = document.createElement('a');
				oPDSOA.innerHTML = '查看详情';
				oPDSO.appendChild(oPDSOA);

				var oPDST = document.createElement('span');
				oPDST.className = 'cart-btn';
				oPicDiv.appendChild(oPDST);

				var oPDSOAT = document.createElement('a');
				oPDSOAT.innerHTML = '加入购物车';
				oPDST.appendChild(oPDSOAT);
			}
			waterfall(parentes,boxe);
			// debugger;
		}
	}

	//检测是否加载数据块的条件
	function checkScrollSlide() {
		var hotWrapper = document.getElementById('hotwrapper');
		var oBoxs = getByClass(hotWrapper,'boxes');
		var lastBoxH = oBoxs[oBoxs.length-1].offsetTop + Math.floor(oBoxs[oBoxs.length-1].offsetHeight/2);
		var scrollTop = document.body.scrollTop  || document.documentElement.scrollTop;
		var height = document.body.clientHeight || document.documentElement.clientHeight;
		if(lastBoxH < (scrollTop + height)) {
			return true;
		}
		else {
			return false;
		}
	}

	//返回第一行中高度最小的一个元素的序列
	function getMinhIndex(arr,val) {
		for (var i in arr) {
			if(arr[i] == val) {
				return i;
			}
		}
	}

	//返回class名是boxes的div
	function getByClass(parents,clsName) {
		var boxArr = new Array();
		var oElements = parents.getElementsByTagName('*');
		for (var i = 0; i < oElements.length; i++) {
			if(oElements[i].className == clsName) {
				boxArr.push(oElements[i]);
			}
		}
		return boxArr;
	}
}

//图片轮播
function palySlider() {

	var bannerSlider = document.getElementById('bannerSlider');
	var oElements = bannerSlider.getElementsByTagName('li');
	var buttons = document.getElementById('bannerButton').getElementsByTagName('li');
	var timer;
	var index = 0;
	var oEleng = 0;
	function showButton() {
		for (var i = 0; i < buttons.length; i++) {
			if(buttons[i].className == 'actives') {
				buttons[i].className = '';
				break;
			}
		}
		buttons[index].className = 'actives';
	}
	function play() {

		playone();
		function playone() {
			oElements[oEleng].className = 'active';
			showButton();
		}
		function playtwo() {
			oElements[oEleng-1].className = '';
			oElements[oEleng].className = 'active';	
			showButton();		
		}
		timer = setInterval(function() {
			oEleng++;
			index++;
			if(oEleng==0) {
				playone();
			}
			else if(oEleng==1) {
				playtwo();	
			}
			else {
				oElements[oEleng-1].className = '';
				oEleng = 0;
				index = 0;
				playone();
			}
		}, 3000);
	}

	function stop() {
		clearInterval(timer);
	}

	bannerSlider.onmousemove = function movepicture() {
		stop();
		var basnSliWidth = bannerSlider.offsetWidth;
		var basnSliHeight = bannerSlider.offsetHeight;
		var mouseX = event.offsetX;
		var mouseY = event.offsetY;
		var X = (basnSliWidth/2 - mouseX)/50;
		var Y = (basnSliHeight/2 - mouseY)/50;
		bannerSlider.style.transform = 'rotateX(' + Y + 'deg) rotateY(' + X +'deg)';
	}
	bannerSlider.onmouseout = function outpicture() {
		play();
		bannerSlider.style.transform = 'rotateX(' + 0 + 'deg) rotateY(' + 0 +'deg)';
	}	

}



