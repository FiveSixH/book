<?php
class Book_model extends CI_Model {
    
    public $_table_name  = 'book';
    
    public function __construct()
    {
        parent::__construct();
        $this->book_db = $this->load->database('book',true);
    }
    
    /*
    * ------------------------------------------------------
    * @description 获取书籍列表
    * @author 夏雨佳
    * @access public
    * @return string
    * @time   2017年4月11日下午2:32:44
    * @code   -
    * ------------------------------------------------------
    */
    public function getBookList($condition = array())
    {
        $this->book_db->where($condition);
        $query = $this->book_db->get($this->_table_name);
        $data = $query->result();
        return $data;
    }
    
    public function getBookInfo($bid = FALSE)
    {
        if(!$bid) return false;
        
        $this->book_db->where('bid',$bid);
        $query = $this->book_db->get($this->_table_name);
        $data = $query->row();
        return $data;
    }
    
    public function updateBook($data = array(),$condition = array())
    {
        if(!$condition || empty($condition)) return false;
    
        $this->book_db->update($this->_table_name,$data,$condition);
        return true;
    }
}