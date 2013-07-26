var htmlContent = {
    "title": "温馨提示",
    "text": "您目前还不是小米认证用户哦！赶快立即去认证吧，完成后即拥有橙色V字尊贵标示，优先参与小米网新品抢购，每月还会赠送特权F码、优惠券等给力优惠！",
    "link": {
        "url": "http://home.xiaomi.cn/home.php?mod=task&do=view&id=72",
        "text": "立即认证"
    }
}
var veriUrl = "/api.php?mod=miverify";

var htmlString = "";

htmlString += "<style>";
htmlString += ".veri_dialog{display:none;position:fixed;top:30px;left:50px;z-index:600;_position:absolute}.veri_dialog .c{width:200px}.veri_dialog .close{float:right;width:16px;height:16px;line-height:16px;margin-top:10px;background:#eee;text-align:center}.veri_dialog h4{padding:10px 0;font-size:1.5em;font-weight:bold}.veri_dialog p{text-indent:2em}.veri_dialog .btns{margin-top:10px;padding-top:10px;border-top:1px solid #ccc}.veri_dialog .btns a{display:block;height:30px;line-height:30px;background:#eee;text-align:center}.veri_dialog .btns label{float:right;height:20px;line-height:20px;margin:10px 0;color:#ccc}.veri_dialog .btns label input{vertical-align:text-bottom;opacity:.3;filter:alpha(opacity = 30)}.veri_dialog_mask{display:none;position:absolute;top:0;left:0;z-index:500;background:#000;opacity:.3;filter:alpha(opacity = 30)}";
htmlString += "</style>";

htmlString += '<div class="veri_dialog" id="veriDialog"><table cellspacing="0" cellpadding="0">';
htmlString += '<tr><td class="t_l"></td><td class="t_c"></td><td class="t_r"></td></tr>';
htmlString += '<tr><td class="m_l">&nbsp;&nbsp;</td><td class="m_c"><div class="f_c"><div class="c">';
htmlString += '<a href="#" class="close" onclick="hideDialog(); return false">X</a>';
htmlString += '<h4>' + htmlContent.title + '</h4>';
htmlString += '<p>' + htmlContent.text + '</p>';
htmlString += '<div class="btns">';
htmlString += '<a href="' + htmlContent.link.url + '">' + htmlContent.link.text + '</a>';
htmlString += '<label><input type="checkbox" id="noMoreShow">&nbsp;不再提示</label>';
htmlString += '</div>';
htmlString += '</div></div></td><td class="m_r"></td></tr>';
htmlString += '<tr><td class="b_l"></td><td class="b_c"></td><td class="b_r"></td></tr>';
htmlString += '</table></div>';
htmlString += '<div class="veri_dialog_mask" id="veriDialogMask"></div>';

document.write(htmlString);

var veriDialog = document.getElementById("veriDialog");
var veriDialogMask = document.getElementById("veriDialogMask");

function setCookie(name, value, day) {
    var exp = new Date();    //new Date("December 31, 9998");
    exp.setTime(exp.getTime() + day * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}
function getCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) return unescape(arr[2]);
    return null;
}
function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = getCookie(name);
    if (cval != null) document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

var showDialog = function () {
    if (getCookie("veri_dialog")) {
        return false
    }

    if (!veriDialog.style.display || veriDialog.style.display == "none") {
        veriDialog.style.cssText = "display: block; visibility: hidden;"
    }

    var pageHeight = document.body.offsetHeight;
    var pageWidth = document.body.offsetWidth;

    var windowHeight = document.documentElement.clientHeight;
    var windowWidth = document.documentElement.clientWidth;

    var dialogLeft = windowWidth / 2 - veriDialog.offsetWidth / 2;
    var dialogTop = windowHeight / 2 - veriDialog.offsetHeight / 2;

    veriDialogMask.style.cssText = "display: block; height: " + pageHeight +"px; width: " + pageWidth + "px";
    veriDialog.style.cssText = "display: block; left: " + dialogLeft + "px ; top: " + dialogTop + "px";

    window.onresize = showDialog;
}
var hideDialog = function () {
    veriDialogMask.style.cssText = "display: none";
    veriDialog.style.cssText = "display: none";

    var noMoreShow = document.getElementById("noMoreShow");
    if (noMoreShow.checked) {
        setCookie("veri_dialog", 1, 365);
    } else {
        setCookie("veri_dialog", 1, 1)
    }
}

var xmlhttp;
if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
}
else {// code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var json = eval("(" + xmlhttp.responseText + ")")
        if (!json.miverify) {
            showDialog();
        }
    }
}
xmlhttp.open("GET", veriUrl, true);
xmlhttp.send();