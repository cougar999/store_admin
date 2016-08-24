<?php
class AdminQuestionController extends AdminController{
	
	public function __construct(){
		$this->template_info = true;
		$this->count = 20;
		parent::__construct();
	}
	
	public function initAction(){
		$pageno = intval(getValue('pageno',1));
		
		$this->assign('page', Question::getPageList($pageno));
		$this->view('question/index.html');
	}
	
	public function repayTpl(){
		$this->template_info = false;
		$this->view('question/repay.tpl','');
	}
	
	public function getQuestRepay(){
		$this->template_info = false;
		$id = trim(getValue('id'));
		$this->assign('page', Question::getQuestRepayList($id));
		$this->view('question/list_repay.tpl' , '');
	}
	
	public function addRepay(){
		unset($arr_input);
		$arr_input['user_id'] = "adminUserid_" . $_SESSION['admin_userid'];
		$arr_input['nickname'] = "客服问答中心";
		$arr_input['content'] = trim(getValue("content"));
		$arr_input['relateid'] = trim(getValue("relateid"));
		$arr_input['chncode'] = isSubmit("chncode") ? trim(getValue('chncode')) : $this->chncode;
		
		$result = Question::addRepay($arr_input);
		echo $result;
	}
	
	public function delAction(){
		$id = getValue('id');
		$result = Question::deleteQuestion($id);
		if($result){
			$data['operate'] = 2;
			$data['questionId'] = $id;
			$detail = ap_core_post("USER_QUESTION_UPDATE_CACHE",$data);
			if(!Validate::isUpdateCache($detail)){
				echo '<script language="javascript">alert("问答接口调用失败!");window.location.href = "' . $_SERVER["HTTP_REFERER"] . '";</script>';
			}else
				header("Location:" . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	public function setMemcacheData(){
		$data['operate'] = getValue("operate");
		$data['questionId'] = getValue("questionId");
		$detail = ap_core_post("USER_QUESTION_UPDATE_CACHE",$data);
		if (isSubmit('ajax')){
			die($detail);
		}else{
			return $detail;
		}
	}
	
	//点击上线下线直接改变状态
	public function changeStatus(){
		$act = trim(getValue('status'));
		$id = trim(getValue('id'));
		
		$obj_question = new Question();
		$result = $obj_question->updownQuestion($id, $act);
		
		echo $result;
	}
}