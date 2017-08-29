<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Script extends CI_Controller {
    
    private $bid;
    private $book_url;
    private $is_new;
    private $is_chapter;
    
    function __construct() {
        
        parent::__construct();
        set_time_limit(0);
        date_default_timezone_set('PRC');
        
        $this->href = "http://www.biquge5200.com";
        
        $this->bid;     //书籍ID
        $this->book_url;//书籍url
        $this->is_new;  //是否只拉取最新章节
        
        $this->is_chapter; //是否是章节 
    }
    
    /**
     * 更新小说
     */
    public function getBiquUpdate() {
        
        $this->load->model('book/Book_model');
        $bookList = $this->Book_model->getBookList(array('is_end'=>2));
//         $bookList = $this->Book_model->getBookList(array('bid'=>2));
        
        foreach ($bookList as $bookInfo) {
            
            //是否拉取所有章节
//             $this->is_new = ($bookInfo->last_update < 1) ? false : true;
            $this->updateChapter($bookInfo);
        }
        
    }
    
    public function test() {
        
        $this->load->model('book/Book_model');
//         $bookList = $this->Book_model->getBookList(array('is_end'=>2));
        $bookList = $this->Book_model->getBookList(array('bid'=>3));
//         print_r($bookList);
        
        foreach ($bookList as $bookInfo) {
            
            $this->bid = $bookInfo->bid;
            $this->book_url = $bookInfo->url;
        
            //是否拉取所有章节
            $this->updateChapterContent($bookInfo);
        }
    }
    
    /**
     * 获取章节列表
     */
    private function updateChapter($bookInfo) {
        
        set_time_limit(0);
        $href = "http://www.biquge5200.com";
        
        $this->bid = $book_id = $bookInfo->bid;
        $this->book_url = $book_url = $bookInfo->url;
        
        $contents = file_get_contents($href."/".$book_url);
        
        $contents = iconv("gb2312", "utf-8//IGNORE",$contents);
        
        preg_match_all("/<dd>(.*?)<\/dd>/si",$contents,$new_contents);
        
        $chapter_list = current($new_contents);
        
        //获取最新章节
        if($this->is_new) {
            array_splice($chapter_list,9);
        }else{
            array_splice($chapter_list,0,9);
        }
        
        $this->load->model('book/Chapter_model');
        
        $chapter_info = array();
        
        foreach($chapter_list as $key=>$val) {
            
            if(preg_match("/href=\"(.*)\"/", $val)) {
                
                preg_match("/href=\"(.*)\"/",$val,$_href);
            }else {
                preg_match("/href=\'(.*)\'/", $val,$_href);
            }
            
            $href_info = explode('/', $_href[1]);
            $href_info = explode(".",end($href_info));
                        
            $md5 = md5($book_id.'_'.$href_info[0]);
            
            //是否存在改章节
            $is_chapter = $this->Chapter_model->getChapterList(array('md5'=>$md5));
            
            if($is_chapter) continue;
            
            //章节序号
            $chapter_number = explode(" ",strip_tags($val));
            $chapter_number = $this->chtonum(trim($chapter_number[0]));
            
            if(!$chapter_number) continue;
            
            $chapter_info[$key]['bid'] = $book_id;
            
            //章节url
            $chapter_info[$key]['url'] = $href_info[0];
            
            //章节顺序
            $chapter_info[$key]['order'] = $chapter_number;
        
//             echo $val.'-'.$chapter_number;
            //章节名称
            $chapter_info[$key]['name'] = strip_tags($val);
            
            //章节唯一标识
            $chapter_info[$key]['md5'] = $md5;
        }
        
//         echo '<pre>';
//         print_r($chapter_info);
//         exit;
        
        //章节存入数据库
        if(!empty($chapter_info)) {
            
            $this->Chapter_model->insertChapterPl($chapter_info);
        }
        
        //更新章节内容
        $this->UpdateChapterContent();

        //更新小说更新时间
        $this->load->model('book/Book_model');
        $bookList = $this->Book_model->updateBook(array('last_update'=>time()),array('bid'=>$bookInfo->bid));
        
    }
    
    //获取章节内容
    private function updateChapterContent() {
        
        $this->load->model('book/Chapter_model');
        $chapter_list = $this->Chapter_model->getChapterList(array('bid'=>$this->bid,'is_load'=>2));
        
        foreach($chapter_list as $key=>$chapter) {
            
            $path = './data/'.$this->book_url.'/'.$chapter->url.'.txt';
            
//             echo 2;
            
            if(!is_file($path)) {
        
                $chapter_contents_url = file_get_contents($this->href."/".$this->book_url.'/'.$chapter->url.'.html');
            
                preg_match("/<div id=\"content\"(.*?)<\/div>/si",$chapter_contents_url,$chapter_contents_array);
            
//                 $this->mkdirs('./'.$this->book_url);
            
                $this->writeTxt($chapter_contents_array[0],$path);
            
                $this->Chapter_model->updateChapter(array('is_load'=>1),array('cid'=>$chapter->cid));
                
                sleep(1);
            }
        }
        
    }
    
    /**
     * @deprecated 写入文本
     * @param unknown $contents
     * @param unknown $path
     */
    private function writeTxt($contents,$path){
    
        $file = fopen($path,'w');
        fwrite($file,$contents);
        fclose($file);
    }
    
    /**
     * @deprecated 创建目录
     * @param unknown $dir
     * @param number $mode
     * @return boolean
     */
    private function mkdirs($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }
    
    private function pd_chapter($str) {
        
        $this->is_chapter = false;
        
        $begin = mb_substr($str,0,1,'utf-8');
        
        $end = mb_substr($str,-1,1,'utf-8');
        
        if( ($begin == '第') && ($end == '章') ) {
            
            $this->is_chapter = true;
        }
        
    }
    
    /**
     * 章节转换
     */
    private function chtonum ($str= '') {
        
        //是否是章节条目
        $this->pd_chapter($str);
        
        if(!$this->is_chapter) return false;
        
        $str = mb_substr(trim($str),1,-1);
        
        if(is_numeric($str)) return $str;
        
        $unit1 = array('万'=>10000);
        $unit2 = array('千'=>1000,'百'=>100,'十'=>10);
        
        $return =  0;
        
        foreach($unit1 as $key => $val)
        {
            $stra = stripos($str,$key);
            if($stra)
            {
                $max = $unit1[$key];
        
                $length = $stra / 3;
        
                $max_str = mb_substr($str,0,$length,'utf-8');
        
                $m_str = $this->conversions($max_str);
        
                $return += $m_str * $max;
        
                $str_length = mb_strlen($str) - $length;
        
                $min_str = mb_substr($str,$length+1,$str_length,'utf-8');
        
                $return += $this->conversions($min_str);
            }
            else
            {
                $return += $this->conversions($str);
            }
        }
        
        return $return;
    }

    private function conversions($string)
    {
        $num = 0;
        $number = array('一'=>1, '二'=>2, '三'=>3, '四'=>4, '五'=>5, '六'=>6, '七'=>7, '八'=>8, '九'=>9,'十'=>10,'百'=>0,'千'=>'0');
        $unit2 = array('千'=>1000,'百'=>100,'十'=>10);
        
        foreach($unit2 as $k => $v)
        {
            $strb = stripos($string,$k);
            
            if($strb)
            {
                $length = $strb / 3;
                
                //数量
                $p = mb_substr($string,$length-1,1,'utf-8');
                
                //单位
                $c = mb_substr($string,$length,1,'utf-8');
                
                $num += $number[$p] * $unit2[$c];
            }
            
        }
        
        $end = mb_substr($string,-1,1,'utf-8');
        
        $num += $number[$end];
        
        return $num;
        
    }
}