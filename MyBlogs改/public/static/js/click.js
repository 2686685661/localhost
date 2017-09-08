var ul = document.getElementById('main-menu');
alert(ul.html);
// var ass = ul.getElementsByTagName('a');

window.onload = function () {
    for(var i=0;i<ass.length;i++) {
        (function (e) {
            ass[e].onclick = function () {
                for(var n=0;0<ass.length;n++) {
                    if(ass[n].className = 'active-menu') {
                        ass[n].className = '';
                    }
                }

                ass[e].className = 'active-menu';

            }
        })(i)
    }
}