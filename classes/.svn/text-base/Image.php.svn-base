<?php
class Image{
	public $previewsize=0.125  ;   //预览图片比例
	public $preview=0;   //是否生成预览，是为1，否为0
    public $datetime;   //随机数
    public $img_name;   //上传图片文件名
    public $img_url; 	//上传保存后的图片路径
    public $img_tmp_name;    //图片临时文件名
    public $img_path = "uploadfile/";    //上传文件存放路径
	public $img_type;   //图片类型
	public $img_size;   //图片大小
	public $imgsize;   //上传图片尺寸，用于判断显示比例
	public $al_img_type=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png');    //允许上传图片类型
	public $al_img_size=1000000;   //允许上传文件大小
	
	function __construct(){
		$this->set_datatime();
	}
	
	function set_datatime(){
		$this->datetime = date("YmdHis");
		$this->img_path = "/".($this->img_path).date("Y")."/".date("m")."/".date("d")."/";
	}
	
	//获取文件类型
	function get_img_type($imgtype){
		$this->img_type = $imgtype;
	}
	//获取文件大小
	function get_img_size($imgsize){
		$this->img_size = $imgsize."<br>";
	}
  //获取上传临时文件名
  function get_img_tmpname($tmp_name){
    $this->img_tmp_name=$tmp_name;
    $this->imgsize=getimagesize($tmp_name);
  }
  //获取原文件名
  function get_img_name($imgname){
    $this->img_name = $this->img_path.$this->datetime.strrchr($imgname,"."); //strrchr获取文件的点最后一次出现的位置
 	//$this->img_url = $this->datetime.strrchr($imgname,"."); //strrchr获取文件的点最后一次出现的位置
 return $this->img_name;
  }
 //判断上传文件存放目录
  function check_path(){
    if(!file_exists(TP_APP_DIR.$this->img_path)){
     mkdirs(TP_APP_DIR.$this->img_path);
    }
  }
  //判断上传文件是否超过允许大小
  function check_size(){
    if($this->img_size > $this->al_img_size){
     $this->showerror("上传图片超过2000KB");
    }
  }
  //判断文件类型
  function check_type(){
   if(!in_array($this->img_type,$this->al_img_type)){
         $this->showerror("上传图片类型错误");
   }
  }
  //上传图片
   function up_imgoto(){
   if(!move_uploaded_file($this->img_tmp_name,TP_APP_DIR.$this->img_name)){
    $this->showerror("上传文件出错");
   }
  }
  //图片预览
   function showimgoto(){
      if($this->preview==1){
      if($this->imgsize[0]>2000){
        $this->imgsize[0]=$this->imgsize[0]*$this->previewsize;
             $this->imgsize[1]=$this->imgsize[1]*$this->previewsize;
      }
     //    echo("<img src="/" mce_src="/""{$this->img_name}/" width=/"{$this->imgsize['0']}/" height=/"{$this->imgsize['1']}/">");
     }
   }
  //错误提示
  function showerror($errorstr){
    echo "<mce:script language=javascript><!--
	alert('$errorstr');location='javascript:history.go(-1);';
	// --></mce:script>";
   exit();
  }
  function save(){
   $this->check_path();
   $this->check_size();
   $this->check_type();
   $this->up_imgoto();
   $this->showimgoto();
  }
  
  function uploadFile($file){
  	$this->get_img_tmpname($file['tmp_name']);  
	$this->get_img_type($file['type']);  
	$this->get_img_size($file['size']);  
	$image_url = $this->get_img_name($file['name']);  
	$this->save();
	
	return $image_url;
  }
}
?>