<!DOCTYPE html>
<html>
<head>
<meta charset="gbk" />
<title>mama123-书友最值得收藏的网络小说阅读网_mama123</title>
<meta name="keywords" content="mama123.top,无错小说,手机免费阅读,全文字,手打,txt,txt下载,最新更新" />
<meta name="description" content="mama123.top手机版致力于打造无广告无弹窗的在线小说阅读网站，提供小说在线阅读，小说TXT下载，网站没有弹窗广告页面简洁。" />
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
<meta http-equiv="expires" content="0">
<meta name="MobileOptimized" content="240" />
<meta name="applicable-device" content="mobile" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/application/views/include/biquge2/css/style.css?v=3" />
<script type="text/javascript" src="/application/views/include/biquge2/js/main.js"></script>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="/">mama123.top手机版</a>
			</h2>
			<p>book.mama123.com</p>
		</div>
		<!-- <div class="reg"><div id="login_top">
	<script>document.writeln("<a class='login_topbtn c_index_login' href=\"\/wap\/login.html?url=" + encodeURIComponent(document.URL) + "\">登录<\/a><a href='/wap/register.html' class='login_topbtn c_index_login' >注册<\/a>&nbsp;&nbsp;")</script>
	</div> -->
	</div>
	</div>
	<div id="info" class="login_top" style="display: none">
		<a href='/bookcase.php' style="color: #fff;">我的书架</a>&nbsp;&nbsp;&nbsp;<a href="/logout.html" style="color: #fff">退出</a>
	</div>
	<script>showlogin()</script>
	<div class="nav">
		<ul>
			<li><a href="/">首页</a></li>
			<li><a href="/sortl">分类</a></li>
			<li><a href="/top">排行</a></li>
			<li><a href="/full">全本</a></li>
			<li><a href="/home">书架</a></li>

			<div class="cc"></div>
		</ul>
	</div>
	<div class="search">
		<form name="articlesearch" method="get" onsubmit="return check();">
			<table cellpadding="0" cellspacing="0" style="width: 100%;">
				<tr>
					<td style="width: 50px;"><div id="type" class="type" onClick="show_search()">书名</div>
						<select id=searchType name=searchtype style="display: none">
							<option value="articlename"></option>
							<option value="author"></option>
						</select>
					</td>
					<td style="background-color: #fff; border: 1px solid #CCC;">
						<input id="s_key" name="searchkey" type="text" class="key" onMouseOver="this.select()" value="输入书名后搜索，宁可少字不要错字" onFocus="this.value=''" />
					</td>
					<td style="width: 35px; background-color: #0080C0; background-image: url('/style/search.png'); background-repeat: no-repeat; background-position: center">
						<input name="button" type="button" value="" class="go" onClick="check()">
					</td>
				</tr>
			</table>
		</form>
	</div>


	<div class="article">
		<h2 class="title">
			<span><a href="/top-weekvisit-1/">点击排行</a></span><a
				href="/top-weekvisit-1/">更多...</a>
		</h2>

		<div class="block">
			<?php foreach ($bookList as $k=>$v):?>
    			<?php if($k == 0):?>
    			<div class="block_img">
    				<a href="/Book/bookInfo/<?php echo $v->bid;?>"><img height=100 width=80 src='/application/views/style/book_img/0_7.jpg' onerror="this.src='/images/no_photo.jpg'" /></a>
    			</div>
    			<div class="block_txt">
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><h2><?php echo $v->name;?></h2></a>
    				</p>
    				<p>
    					作者：<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a>
    				</p>
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->description;?>，...</a>
    				</p>
    			</div>
    			<div style="clear: both"></div>
    			<ul>
    			<?php else:?>
    				<li><a href="/<?php echo $cateList[$v->cate]->url;?>">[<?php echo $cateList[$v->cate]->name;?>]</a><a href="/Book/bookInfo/<?php echo $v->bid;?>" class="blue"><?php echo $v->name;?></a>/<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a></li>
    			<?php endif;?>
    			
    			<?php if($k == 0):?>
    			</ul>
    			<?php endif;?>
			<?php endforeach;?>
		</div>
	</div>


	<div class="article">
		<h2 class="title">
			<span><a href="/top-weekvote-1/">推荐排行</a></span><a
				href="/top-weekvote-1/">更多...</a>
		</h2>

		<div class="block">
			<?php foreach ($bookList as $k=>$v):?>
    			<?php if($k == 0):?>
    			<div class="block_img">
    				<a href="/Book/bookInfo/<?php echo $v->bid;?>"><img height=100 width=80 src='/application/views/style/book_img/0_7.jpg' onerror="this.src='/images/no_photo.jpg'" /></a>
    			</div>
    			<div class="block_txt">
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><h2><?php echo $v->name;?></h2></a>
    				</p>
    				<p>
    					作者：<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a>
    				</p>
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->description;?>...</a>
    				</p>
    			</div>
    			<div style="clear: both"></div>
    			<ul>
    			<?php else:?>
    				<li><a href="/<?php echo $cateList[$v->cate]->url;?>">[<?php echo $cateList[$v->cate]->name;?>]</a><a href="/Book/bookInfo/<?php echo $v->bid;?>" class="blue"><?php echo $v->name;?></a>/<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a></li>
    			<?php endif;?>
    
    			<?php if($k == 0):?>
    			</ul>
    			<?php endif;?>
			
			<?php endforeach;?>
		</div>


	</div>



	<div class="article">
		<h2 class="title">
			<span><a href="/top-goodnum-1/">收藏排行</a></span><a
				href="/top-goodnum-1/">更多...</a>
		</h2>

		<div class="block">
			<?php foreach ($bookList as $k=>$v):?>
    			<?php if($k == 0):?>
    			<div class="block_img">
    				<a href="/Book/bookInfo/<?php echo $v->url;?>"><img height=100 width=80 src='/application/views/style/book_img/0_7.jpg' onerror="this.src='/images/no_photo.jpg'" /></a>
    			</div>
    			<div class="block_txt">
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->url;?>"><h2><?php echo $v->name;?></h2></a>
    				</p>
    				<p>
    					作者：<a href="/Book/bookInfo/<?php echo $v->url;?>"><?php echo $v->author;?></a>
    				</p>
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->url;?>"><?php echo $v->description;?>...</a>
    				</p>
    			</div>
    			<div style="clear: both"></div>
    			<ul>
    			<?php else:?>
    				<li><a href="/<?php echo $cateList[$v->cate]->url;?>">[<?php echo $cateList[$v->cate]->name;?>]</a><a href="/Book/bookInfo/<?php echo $v->bid;?>" class="blue"><?php echo $v->name;?></a>/<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a></li>
    			<?php endif;?>
    
    			<?php if($k == 0):?>
    			</ul>
    			<?php endif;?>
			
			<?php endforeach;?>
		</div>


	</div>



	<div class="article">
		<h2 class="title">
			<span><a href="/top-postdate-1/">新书上架</a></span><a
				href="/top-postdate-1/">更多...</a>
		</h2>
		<div class="block">
			<?php foreach ($bookList as $k=>$v):?>
    			<?php if($k == 0):?>
    			<div class="block_img">
    				<a href="/Book/bookInfo/<?php echo $v->url;?>"><img height=100 width=80 src='/application/views/style/book_img/0_7.jpg' onerror="this.src='/images/no_photo.jpg'" /></a>
    			</div>
    			<div class="block_txt">
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><h2><?php echo $v->name;?></h2></a>
    				</p>
    				<p>
    					作者：<a href="/Book/bookInfo/<?php echo $v->url;?>"><?php echo $v->author;?></a>
    				</p>
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->url;?>"><?php echo $v->description;?>，...</a>
    				</p>
    			</div>
    			<div style="clear: both"></div>
    			<ul>
    			<?php else:?>
    				<li><a href="/<?php echo $cateList[$v->cate]->url;?>">[<?php echo $cateList[$v->cate]->name;?>]</a><a href="/Book/bookInfo/<?php echo $v->bid;?>" class="blue"><?php echo $v->name;?></a>/<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a></li>
    			<?php endif;?>
    			
    			<?php if($k == 0):?>
    			</ul>
    			<?php endif;?>
			<?php endforeach;?>
		</div>
	</div>



	<div class="article">
		<h2 class="title">
			<span><a href="/top-lastupdate-1/">最近更新</a></span><a href="/top-lastupdate-1/">更多...</a>
		</h2>

		<div class="block">
			<?php foreach ($bookList as $k=>$v):?>
    			<?php if($k == 0):?>
    			<div class="block_img">
    				<a href="/Book/bookInfo/<?php echo $v->bid;?>"><img height=100 width=80 src='/application/views/style/book_img/0_7.jpg' onerror="this.src='/images/no_photo.jpg'" /></a>
    			</div>
    			<div class="block_txt">
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><h2><?php echo $v->name;?></h2></a>
    				</p>
    				<p>
    					作者：<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a>
    				</p>
    				<p>
    					<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->description;?>，...</a>
    				</p>
    			</div>
    			<div style="clear: both"></div>
    			<ul>
    			<?php else:?>
    				<li><a href="/<?php echo $cateList[$v->cate]->url;?>">[<?php echo $cateList[$v->cate]->name;?>]</a><a href="/Book/bookInfo/<?php echo $v->bid;?>" class="blue"><?php echo $v->name;?></a>/<a href="/Book/bookInfo/<?php echo $v->bid;?>"><?php echo $v->author;?></a></li>
    			<?php endif;?>
    			
    			<?php if($k == 0):?>
    			</ul>
    			<?php endif;?>
			<?php endforeach;?>
		</div>


	</div>

	<script>qijixs_bottom();</script>

	<div class="footer">
		<ul>
			<li><a href="/">首页</a></li>
			<li><a href="http://book.mama123.top">电脑版</a></li>
			<li><a href="/bookcase.php">书架</a></li>
			<li><a href="/modules/article/waps.php" style="color: red">搜索</a></li>
			<li></li>
		</ul>
		<br />
		<br />
		<br />
	</div>
	<script>foot()</script>
	<script>qijixs_dingbu()</script>
	<div style="display: none; width: 0px">
		<script>tongji()</script>
	</div>
	<div class="article">
		<h2 class="title">
			<span>友情链接</span>
		</h2>
		<div class="block">
			<ul>
				<li><a href="http://m.yznn.com" target="_blank">免费小说</a></li>
			</ul>
		</div>
	</div>
</body>
</html>