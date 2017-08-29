<style>
.chapter-info{line-height:2em;list-style-type:none;font-size:3em;}
a{ text-decoration:none; }
a:link {color: #000;}
a:visited {color: red;}
a:hover {color: red;} 
</style>
<div>
<a href ="http://book.mama123.top/Book/bookInfo/<?php echo $bookInfo->bid;?>">正序</a> | <a href ="http://book.mama123.top/Book/bookInfo/<?php echo $bookInfo->bid;?>/1">倒序</a>
</div>
<ul>
	<?php foreach ($chapterList as $chapterInfo):?>
	<li class="chapter-info"><a href="/Book/chapterContents/<?php echo $bookInfo->bid.'/'.$chapterInfo->cid;?>"><?php echo $chapterInfo->name; ?></li>
	<?php endforeach;?>
</ul>