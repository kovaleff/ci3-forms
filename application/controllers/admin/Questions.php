<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once "BaseAdminController.php";

class Questions extends BaseAdminController
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('QuestionModel');
	}

	public function index()
	{

		$questions = $this->QuestionModel->all();
		$this->render_page('admin/questions', [
			'questions' => $questions
		]);
	}

	public function edit(int $id)
	{
		if ($this->input->method(TRUE) == 'POST') {
			$data = $this->security->xss_clean($this->input->post());
			$this->QuestionModel->update($id, $data);
			redirect(base_url('/admin/questions/'));
		}
		$question = $this->QuestionModel->find($id);
		$this->render_page('admin/question', [
			'question' => $question
		]);
	}

	function delete(int $id)
	{
		$this->QuestionModel->delete($id);
		redirect(base_url('/admin/questions/'));
	}

}
