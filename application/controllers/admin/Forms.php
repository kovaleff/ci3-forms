<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "BaseAdminController.php";

class Forms extends BaseAdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('FormModel');
		$this->load->model('QuestionModel');
	}

	public function index(){

		$forms = $this->FormModel->all();
		$this->render_page('admin/forms',[
			'forms' => $forms
		]);
	}

	function add(){
		if($this->input->method(TRUE) =='POST'){
			$data = $this->security->xss_clean($this->input->post());
			$this->FormModel->add($data);
			redirect(base_url('/admin/forms/'));
		}

		$questions = $this->QuestionModel->all();
		$this->render_page('admin/form_add',[
			'questions' => $questions
		]);
	}

	function delete(int $id){
		$this->FormModel->delete($id);
		redirect(base_url('/admin/forms/'));
	}

	function activate($id){
		$this->FormModel->activate($id);
		return true;
	}
}
