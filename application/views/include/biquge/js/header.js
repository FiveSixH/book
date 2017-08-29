﻿/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
function cookie_encode(string){
	//full uri decode not only to encode ",; =" but to save uicode charaters
	var decoded = encodeURIComponent(string);
	//encod back common and allowed charaters {}:"#[] to save space and make the cookies more human readable
	var ns = decoded.replace(/(%7B|%7D|%3A|%22|%23|%5B|%5D)/g,function(charater){return decodeURIComponent(charater);});
	return ns;
}
jQuery.cookie = function (key, value, options) {
    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : cookie_encode(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};

document.onkeydown = function(e){
	var e = e ? e : window.event;
	var keyCode = e.which ? e.which : e.keyCode;
	var kw = document.getElementById('wd');
	if (e.keyCode==13 && kw.value=='' && typeof(index_page) != "undefined") {
		location.href=index_page;
	}
	if (e.keyCode==37 && typeof(preview_page) != "undefined") location.href=preview_page;
	if (e.keyCode==39 && typeof(next_page) != "undefined") location.href=next_page;
} 
var autopage;// = $.cookie("autopage");
var night;
var timer;
var temPos=1;

$(document).ready(function(){
	if( typeof(next_page) !== "undefined" ) {
		next_page = next_page;
		autopage = $.cookie("autopage");
		sbgcolor = $.cookie("bcolor");
		setBGColor(sbgcolor);
		font = $.cookie("font");
		setFont(font);
		size = $.cookie("size");
		setSize(size);
		color = $.cookie("color");
		setColor(color);
		width = $.cookie("width");
		setWidth(width);
		night = $.cookie('night');
		if(night==1) {
			$("#night").attr('checked',true);
			setNight();
		}
	}
});

if (typeof(getCookie("bgcolor")) != 'undefined') {
    wrapper.style.background = getCookie("bgcolor");
    document.getElementById("bcolor").value = getCookie("bgcolor")
}
function changebgcolor(id) {
    wrapper.style.background = id.options[id.selectedIndex].value;
    setCookie("bgcolor", id.options[id.selectedIndex].value, 365)
}
function setBGColor(sbgcolor){
	$('#wrapper').css("backgroundColor",sbgcolor);
	$.cookie("bcolor",sbgcolor,{path:'/',expires:365});
}
function setColor(color) {
	$("#content").css("color",color);
	$.cookie("color",color,{path:'/',expires:365});
}
function setSize(size) {
	$("#content").css("fontSize",size);
	$.cookie("size",size,{path:'/',expires:365});
}
function setFont(font) {
	$("#content").css("fontFamily",font);
	$.cookie("font",font,{path:'/',expires:365});
}
function setWidth(width){
	$('#content').css("width",width);
	$.cookie("width",width,{path:'/',expires:365});
}
function setNight(){
	if($("#night").is(':checked')) {
		$('div').css("backgroundColor","#111111");
		$('div,a').css("color","#939392");
		$.cookie("night",1,{path:'/',expires:365});
	} else {
		$('div').css("backgroundColor","");
		$('div,a').css("color","");
		$.cookie("night",0,{path:'/',expires:365});
	}
}
function setCookie(name, value, day) {
    var exp = new Date();
    exp.setTime(exp.getTime() + day * 24 * 60 * 60 * 1000);
    document.cookie = name + "= " + escape(value) + ";expires= " + exp.toGMTString()
}
function getCookie(objName) {
    var arrStr = document.cookie.split("; ");
    for (var i = 0; i < arrStr.length; i++) {
        var temp = arrStr[i].split("=");
        if (temp[0] == objName) return unescape(temp[1])
    }
}

function setAutopage(){
	if($('#autopage').is(":checked") == true){
		$('#autopage').attr("checked",true);	
		$.cookie("autopage",1,{path:'/',expires:365});
	}else{
		$('#autopage').attr("checked",false);
		$.cookie("autopage",0,{path:'/',expires:365});
	}
}

function delCookie(name){
   var date = new Date();
   date.setTime(date.getTime() - 10000);
   document.cookie = name + "=a; expires=" + date.toGMTString();
}

function get_cookie_value(Name) { 
  var search = Name + "=";
　var returnvalue = ""; 
　if (document.cookie.length > 0) { 
　  offset = document.cookie.indexOf(search) 
　　if (offset != -1) { 
　　  offset += search.length 
　　  end = document.cookie.indexOf(";", offset); 
　　  if (end == -1) 
　　  end = document.cookie.length; 
　　  returnvalue=unescape(document.cookie.substring(offset, end));
　　} 
　} 
　return returnvalue; 
}
function login(){
document.writeln("<div class=\"ywtop\"><div class=\"ywtop_con\"><B>公告：</B>本网站基于YGBOOK v3.0系统搭建，感谢使用。请您牢记本站网址，感谢大家的支持！<button onclick=\"window.open('http://book.mama123.top');\" style=\"color:red\">了解详情</button></span>");
document.write('<div class="nri"></div></div></div>');
}

function loadbooklist(t,id){

}

function textselect(){
document.writeln("<div id=\"page_set\">");
document.writeln("<select onchange=\"javascript:setFont(this.options[this.selectedIndex].value);\" id=\"bcolor\" name=\"bcolor\"><option value=\"宋体\">字体</option><option value=\"方正启体简体\">默认</option><option value=\"黑体\">黑体</option><option value=\"楷体_GB2312\">楷体</option><option value=\"微软雅黑\">雅黑</option><option value=\"方正启体简体\">启体</option><option value=\"宋体\">宋体</option></select>");
document.writeln("<select onchange=\"javascript:setColor(this.options[this.selectedIndex].value);\" id=\"bcolor\" name=\"bcolor\"><option value=\"#000\">颜色</option><option value=\"#333\">默认</option><option value=\"#9370DB\">暗紫</option><option value=\"#2E8B57\">藻绿</option><option value=\"#2F4F4F\">深灰</option><option value=\"#778899\">青灰</option><option value=\"#800000\">栗色</option><option value=\"#6A5ACD\">青蓝</option><option value=\"#BC8F8F\">玫褐</option><option value=\"#F4A460\">黄褐</option><option value=\"#F5F5DC\">米色</option><option value=\"#F5F5F5\">雾白</option></select>");
document.writeln("<select onchange=\"javascript:setSize(this.options[this.selectedIndex].value);\" id=\"bcolor\" name=\"bcolor\"><option value=\"#E9FAFF\">大小</option><option value=\"19pt\">默认</option><option value=\"10pt\">10pt</option><option value=\"12pt\">12pt</option><option value=\"14pt\">14pt</option><option value=\"16pt\">16pt</option><option value=\"18pt\">18pt</option><option value=\"20pt\">20pt</option><option value=\"22pt\">22pt</option><option value=\"25pt\">25pt</option><option value=\"30pt\">30pt</option></select>");
document.writeln("<select onchange=\"javascript:setBGColor(this.options[this.selectedIndex].value);\" id=\"bcolor\" name=\"bcolor\"><option value=\"#E9FAFF\" style=\"background-color: #E9FAFF;\">背景</option><option value=\"#E9FAFF\" style=\"background-color: #E9FAFF;\">默认</option><option value=\"#FFFFFF\" style=\"background-color: #FFFFFF;\">白雪</option><option value=\"#000000\" style=\"background-color: #000000;color:#FFFFFF;\">漆黑</option><option value=\"#FFFFED\" style=\"background-color: #FFFFED;\">明黄</option><option value=\"#EEFAEE\" style=\"background-color: #EEFAEE;\">淡绿</option><option value=\"#CCE8CF\" style=\"background-color: #CCE8CF;\">草绿</option><option value=\"#FCEFFF\" style=\"background-color: #FCEFFF;\">红粉</option><option value=\"#EFEFEF\" style=\"background-color: #EFEFEF;\">深灰</option><option value=\"#F5F5DC\" style=\"background-color: #F5F5DC;\">米色</option><option value=\"#D2B48C\" style=\"background-color: #D2B48C;\">茶色</option><option value=\"#C0C0C0\" style=\"background-color: #E7F4FE;\">银色</option></select>");
document.writeln("<select onchange=\"javascript:setWidth(this.options[this.selectedIndex].value);\" id=\"bcolor\" name=\"bcolor\"><option value=\"95%\">宽度</option><option value=\"95%\">默认</option><option value=\"85%\">85%</option><option value=\"76%\">75%</option><option value=\"67%\">65%</option><option value=\"53%\">50%</option><option value=\"41%\">40%</option></select>");
document.writeln("</select>翻页<input type=checkbox name=autopage id=autopage onchange=\"javascript:setAutopage();\" value=\"\" />&nbsp;夜间<input type=checkbox name=night id=night onchange=\"javascript:setNight();\" value=\"\" /></div>");
}

function footer(){
document.writeln("<p>本站所有小说均由根据搜索引擎协议转码而来，只为让更多读者欣赏，本站不保存小说内容及数据，仅作宣传展示。</p>");
document.writeln("<p>Copyright &copy; 2010-2016 powered by YGBOOK v3.0. <button onclick=\"window.open('http://book.mama123.top');\" style=\"color:red\">了解详情</button></p>");
document.writeln("<p>晋ICP备XXXXXXXX号</p>");
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
document.writeln("<script charset=\'gbk\' src=\'http://www.baidu.com/js/opensug.js\'></script>");
}
function read_panel(){
document.writeln("<div class=\"header_search\"><form name=\"form\" action=\"http://zhannei.baidu.com/cse/search\" method=\"get\" id=\"sform\" target=\"_blank\"><input type=\"hidden\" name=\"s\" value=\"287293036948159515\"><input type=\"text\" placeholder=\"可搜书名，请您少字也别输错字\" value=\"\" name=\"q\" class=\"search\" id=\"wd\" baiduSug=\"2\" /><button id=\"sss\" type=\"submit\"> 搜 索 </button></form></div>");
document.writeln("<div class=\"userpanel\" onclick=\"window.open('http://book.mama123.top');\">&nbsp;<font color=\"red\">YGBOOK v3.0<br>http://book.mama123.top</font></div>");
}
function list_panel(){
document.writeln("<div class=\"header_search\"><form name=\"form\" action=\"http://zhannei.baidu.com/cse/search\" method=\"get\" id=\"sform\" target=\"_blank\"><input type=\"hidden\" name=\"s\" value=\"287293036948159515\"><input type=\"text\" placeholder=\"可搜书名，请您少字也别输错字\" value=\"\" name=\"q\" class=\"search\" id=\"wd\" baiduSug=\"2\" /><button id=\"sss\" type=\"submit\"> 搜 索 </button></form></div>");
document.writeln("<div class=\"userpanel\" onclick=\"window.open('http://book.mama123.top');\">&nbsp;<font color=\"red\">YGBOOK v3.0<br>http://book.mama123.top</font></div>");
}
function panel(){
document.writeln("<div class=\"header_search\"><form name=\"form\" action=\"http://zhannei.baidu.com/cse/search\" method=\"get\" id=\"sform\" target=\"_blank\"><input type=\"hidden\" name=\"s\" value=\"287293036948159515\"><input type=\"text\" placeholder=\"可搜书名，请您少字也别输错字\" value=\"\" name=\"q\" class=\"search\" id=\"wd\" baiduSug=\"2\" /><button id=\"sss\" type=\"submit\"> 搜 索 </button></form></div>");
document.writeln("<div class=\"userpanel\" onclick=\"window.open('http://book.mama123.top');\">&nbsp;<font color=\"red\">YGBOOK v3.0<br>http://book.mama123.top</font></div>");
}
function mark(){

}
function listindex(){

}
function list1(){

}

function readx(){

}

function read1(){

}
function read2(){

}
function read3(){

}
function read4(){

}
function readxx(){

}
function bdshare(){
document.writeln("<div class=\'bdsharebuttonbox\' style=\'padding: 0 10px\'><a href=\'#\' class=\'bds_more\' data-cmd=\'more\'>分享本书到：</a><a href=\'#\' class=\'bds_mshare\' data-cmd=\'mshare\' title=\'分享到一键分享\'>一键分享</a><a href=\'#\' class=\'bds_weixin\' data-cmd=\'weixin\' title=\'分享到微信\'>微信</a><a href=\'#\' class=\'bds_tieba\' data-cmd=\'tieba\' title=\'分享到百度贴吧\'>百度贴吧</a><a href=\'#\' class=\'bds_qzone\' data-cmd=\'qzone\' title=\'分享到QQ空间\'>QQ空间</a><a href=\'#\' class=\'bds_tsina\' data-cmd=\'tsina\' title=\'分享到新浪微博\'>新浪微博</a><a href=\'#\' class=\'bds_sqq\' data-cmd=\'sqq\' title=\'分享到QQ好友\'>QQ好友</a><a href=\'#\' class=\'bds_fbook\' data-cmd=\'fbook\' title=\'分享到Facebook\'>Facebook</a></div>");
}