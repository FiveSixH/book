<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    
    public function test() {
        
        $this->load->model('book/Book_model');
        $bookList = $this->Book_model->getBookList();
    }
    
    public function bookInfo() {
        
        $bid = $this->uri->segment(3);
        
        $sort = $this->uri->segment(4);
        
        //排序
        $sort = isset($sort) ? $sort : false;
        
        //获取小说信息
        $this->load->model('book/Book_model');
        $data['bookInfo'] = $this->Book_model->getBookInfo($bid);
        
        //获取章节列表
        $this->load->model('book/Chapter_model');
        $data['chapterList'] = $this->Chapter_model->getChapterList(array('bid'=>$bid),$sort);
        
        $this->load->view('book/bookInfo',$data);
    }
    
    public function chapterContents() {
        
        $bid = trim($this->uri->segment(3));
        $cid = trim($this->uri->segment(4));
        
        $data['bid'] = $bid;
        $data['cid'] = $cid;
        
        //获取小说信息
        $this->load->model('book/Book_model');
        $bookInfo = $this->Book_model->getBookInfo($bid);
        
        $data['book_name'] = $bookInfo->name;
        
        //获取章节列表
        $this->load->model('book/Chapter_model');
        $chapterInfo = $this->Chapter_model->getChapterInfo($cid);
        
        $url = '/data/'.$bookInfo->url.'/'.$chapterInfo->url.'.txt';
        $content = file_get_contents('http://book.mama123.top'.$url);
        
        $data['content'] = iconv("gb2312", "utf-8//IGNORE",$content);
        
        $data['chapter_name'] = $chapterInfo->name;
        
        $this->load->view('book/content',$data);
    }
    
    
}