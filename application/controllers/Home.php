<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        //获取分类
        $this->load->model('book/Cate_model');
        $data['cateList'] = $this->Cate_model->getCateList();
        
        //获取小说列表
        $this->load->model('book/Book_model');
        $data['bookList'] = $this->Book_model->getBookList();
//         echo "<pre>";
//         print_r($data);
        
        $this->load->view('book/home',$data);
    }
    
    
}