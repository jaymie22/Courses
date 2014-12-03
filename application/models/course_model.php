<?php  
	class Course_model extends CI_Model
	{
		public function get_all_course()
		{
			return $this->db->order_by('created_at', 'desc')
							->get('course')
							->result_array();
							
		}
		public function get_course($id)
		{
			return $this->db->where('id',$id)
			 				->get('course')
			 				->row_array();	
		}
		public function insert_course($insert_data)
		{
			return $this->db->insert('course',$insert_data);
			// return $this->db->query($query, $values);
		}
		public function delete_course($insert_data)
		{
			return $this->db->where('id',$insert_data)
							->delete('course');

		}
	}

?>