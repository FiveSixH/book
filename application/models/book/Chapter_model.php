<?php
class Chapter_model extends CI_Model {
    
    public $_table_name  = 'chapter';
    
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
    public function getChapterList($condition = array(),$sort=false)
    {
        $this->book_db->where($condition);
        
        if($sort) $this->book_db->order_by('cid','desc');
        
        $query = $this->book_db->get($this->_table_name);
        
        $data = $query->result();
        
        return $data;
    }
    
    public function getChapterInfo($cid = false)
    {
        if(!$cid) return false;
        
        $this->book_db->where('cid',$cid);
        
        $query = $this->book_db->get($this->_table_name);
        
        $data = $query->row();
        
        return $data;
    }
    
    public function insertChapter($data = array())
    {
        $this->book_db->insert($this->_table_name, $data);
        $cid = $this->book_db->insert_id();
        return $cid;
    }
    
    public function insertChapterPl($data = array())
    {
        $this->book_db->insert_batch($this->_table_name, $data);
        return true;
    }
    
    public function updateChapter($data = array(),$condition = array())
    {
        if(!$condition || empty($condition)) return false;
    
        $this->book_db->update($this->_table_name,$data,$condition);
        return true;
    }
    
}