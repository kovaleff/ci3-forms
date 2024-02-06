<?php
class FormModel extends CI_Model {

	public function all(){
		$query = $this->db->get('forms');
		return $query->result();
	}

	function add($data){
		$this->db->insert('forms',[
			'title' => $data['title'],
			'status' => 'Не обработано'
		]) ;
		$formId = $this->db->insert_id();
		foreach($data['questions'] as $questionId){
			$this->db->simple_query("INSERT INTO questions_has_forms (question_id, form_id, processed_at) 
					VALUES ($questionId, $formId, NOW())");
		}
	}

	function last(){
		$form = $this->db->query('SELECT id FROM forms WHERE status = "Обработано" ORDER BY id DESC LIMIT 1')->row();
		if($form){
			$query = $this->db->query("SELECT forms.id, forms.title, question_id, questions.id as question_id, questions.question FROM forms
			INNER JOIN questions_has_forms ON questions_has_forms.form_id = forms.id
			INNER JOIN questions ON questions_has_forms.question_id = questions.id
            WHERE forms.id = {$form->id}");
			return $query->result();
		} else return null;
	}

	function update($id, $data):bool{
		unset($data['id']);
		try {
			$this->db->where('id', $id);
			$this->db->update('questions', $data);
			return true;
		} catch (\Exception $e){
			return false;
		}
	}

	function delete($id){
		try {
			$this->db->simple_query("DELETE FROM questions_has_forms WHERE form_id = $id");
			$this->db->simple_query("DELETE FROM answers WHERE form_id = $id");

			$this->db->where('id', $id);
			$this->db->delete('forms');
			return true;
		} catch (Exception $e){
			return false;
		}
	}

	function activate($id){
		$this->db->where('id', $id);
		$this->db->update('forms', [
			'status' => 'Обработано'
		]);
	}

}
