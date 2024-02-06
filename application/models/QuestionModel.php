<?php
class QuestionModel extends CI_Model {
	public $question;

	public function all(){
		$query = $this->db->get('questions');
		return $query->result();
	}
	function find($id){
		$query = $this->db->where('id', $id)->get('questions');
		return $query->row_object();
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
			$this->db->where('id', $id);
			$this->db->delete('questions');
			return true;
		} catch (Exception $e){
			return false;
		}
	}

}
