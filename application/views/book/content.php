<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title><?php echo '【'.$book_name.'】'.$chapter_name;?></title>
<script type="text/javascript" src="/application/views/style/js/jquery-3.2.0.min.js"></script>
<style type="text/css">
a{ text-decoration:none; }
a:link {color: #fff;}
a:visited {color: #fff;}
#main{width:980px;}
.clear{ clear:both}
.sidebar-box{display:none;}
    .sidebar-left{position:fixed;top:45%;}
    .sidebar-right{position:fixed;top:45%;right:0;}
        #pre-chapter{height:150px;}
        #next-chapter{height:150px;}

    .sidebar-foot{display:none;background-color:#000;height:5%;width:980px;position:fixed;top:95%;}
    .sidebar-foot ul{height:5%;font-size:2.5em;list-style-type:none;}
    .sidebar-foot ul li{color:#fff;float:left;margin-left:15%;margin-top:-2%;}
    
    .sidebar-setting{display:none;background-color:#000;height:5%;width:980px;position:fixed;top:90%;}
    .sidebar-setting ul{height:5%;font-size:2.5em;list-style-type:none;}
    .sidebar-setting ul li{float:left;margin-left:17%;margin-top:-2%;}
        #font-minus{color:#fff;width:3em;border:solid 1px #fff;}
        #font-plus{color:#fff;width:3em;border:solid 1px #fff;}

#content{line-height:2em;font-size:3em;}

</style>
</head>
<body>
	<div id="main">
    	<div class="content-nav">
    	</div>
    	<div class="sidebar-box">
    		<div class="sidebar-left"><a href="/Book/chapterContents/<?php echo $bid;?>/<?php echo $cid-1;?>"><img src="/application/views/style/images/left.png" id="pre-chapter"></a></div>
    		<div class="sidebar-right"><a href="/Book/chapterContents/<?php echo $bid;?>/<?php echo $cid+1;?>"><img src="/application/views/style/images/right.png" id="next-chapter"></a></div>
		</div>
    	<h1 style="text-align:center;"><?php echo $chapter_name;?></h1>
    	<?php echo $content;?>
    	<div class="clear"></div>
    	<div class="sidebar-foot">
    		<ul>
        		<li><a href="/Book/bookInfo/<?php echo $bid;?>">返回目录</a></li>
        		<li id="setting-button">设置</li>
        		<li>下载</li>
    		</ul>
		</div>
		<div class="sidebar-setting">
			<ul>
				<li id="font-minus">A-</li>
				<li id="font-plus">A+</li>
			</ul>
		</div>
	</div>
</body>
<script>
$(function(){

// 	var font-size = 13p;
// 	$("#content").css("font-size","20");

	var font_size = $("#content").css("font-size");

	font_size = font_size.substring(0,font_size.length-2);

// 	console.log("s1:"+font_size);

	$("#content").click(function(){

		$(".sidebar-box").toggle();
		$(".sidebar-foot").toggle();
	});

	$("#setting-button").click(function(){

// 		$(".sidebar-setting").toggle();
	});


	$("#font-minus").click(function(){

// 		console.log("s2:"+font_size);
		
		font_size = font_size - 1;

// 		console.log("s3:"+font_size);

		$("#content").css("font-size",font_size+"em");
	});

	$("#font-plus").click(function(){

		console.log("s2:"+font_size);
		font_size = font_size - 1 + 2;

		console.log("s3:"+font_size);
		$("#content").css("font-size",font_size+"em");
	});

	
});
</script>

</html>
