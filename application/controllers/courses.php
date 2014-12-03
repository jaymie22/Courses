<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct(); 
	}

	public function index()
	{
		$this->load->model('course_model');
		$get_all_courses['courses'] = $this->course_model->get_all_course();
		$this->load->view('courses_display',$get_all_courses);

		$this->output->enable_profiler(TRUE);
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('course_name','Name', 'required|min_length[15]');

		if($this->form_validation->run() === FALSE)
			$this->index();
		else
		{
			$this->load->model('course_model');
			$date = date('Y-m-d H:i:s');

			$course_data = array(
				'name' => $this->input->post('course_name'),
				'description' => $this->input->post('course_description'),
				'created_at' => $date,
				'updated_at' => $date
			);

			$course_id = $this->course_model->insert_course($course_data);

			$this->index();
			// $add_message = ($course_id === TRUE) ? "Course is added!" : "Fail to add course. Please try again!";	
			// $this->session->set_userdata('add_message',$add_message);
		}

		$this->output->enable_profiler(TRUE);
	}

	public function destroy($delete_id)
	{
		$this->load->model('course_model');
		$delete['delete_data'] = $this->course_model->get_course($delete_id);

		$this->load->view('delete_course', $delete);
		$this->output->enable_profiler(TRUE);
	}

	public function destroy_process($delete_id)
	{
		$this->load->model('course_model');
		$deleted_status = $this->course_model->delete_course($delete_id);

		redirect(base_url());
		$this->output->enable_profiler(TRUE);
	}

}

/* End of file courses.php */
/* Location: ./application/controllers/courses.php */