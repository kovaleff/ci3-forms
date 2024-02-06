<?php
class AnswerModel extends CI_Model {
	public $question;

	public function save($data){
		$total = count($data['question_id']);;
		for($i=0;$i<$total;$i++){
			$this->db->insert('answers',[
				'answer' => $data['answer'][$i],
				'question_id' => $data['question_id'][$i],
				'form_id' => $data['form_id'],
			]) ;
		}
	}
}
