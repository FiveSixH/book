<?php
class Cate_model extends CI_Model {
    
    public $_table_name  = 'cate';
    
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
    public function getCateList($condition = array())
    {
        $query = $this->book_db->get($this->_table_name);
        $data = $query->result();
        
        $return = array();
        
        foreach ($data as $k => $v) {
            
            $return[$v->cate_id] = $v;
        }
        
        return $return;
    }
    
}