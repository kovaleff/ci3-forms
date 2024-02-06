<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'BaseController.php';

class Index extends BaseController {

	function __construct(){
		parent::__construct();
		$this->load->model('FormModel');
		$this->load->model('QuestionModel');
		$this->load->model('AnswerModel');
	}

	public function index(){
		if($this->input->method(TRUE) =='POST'){
			$data = $this->security->xss_clean($this->input->post());
			$this->AnswerModel->save($data);
			$this->session->set_flashdata('message', 'Спасибо!');
			redirect(base_url('/'));
		}

		$quesions = $this->FormModel->last();
		if($quesions){
			$this->render_page('home',[
				'quesions' => $quesions
			]);
		}
		else {
			$this->render_page('none');
		}
	}
}
