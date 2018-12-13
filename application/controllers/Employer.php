<?php
class Employer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Employer_model');
	}

	public function register(){
		$this->load->view('Employer/register');
	}

	/* 
	The funtion is used to save the data of the employer 
	*/
	public function save_information(){
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|exact_length[10]|regex_match[/^[0-9]{3}[0-9]{3}[0-9]{4}$/]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('email','Email','is_unique[employers.email_id]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('Employer/register');
		}
		else{
			$save = array(
				"company_name" 		=>	$this->input->post('company_name'),
				"company_address" 	=>	$this->input->post('company_address'),
				"first_name" 		=>	$this->input->post('firstname'),
				"last_name" 		=>	$this->input->post('lastname'),
				"gender" 			=>	$this->input->post('gender'),
				"contact_number" 	=>	$this->input->post('contact_number'),
				"current_location" 	=>	$this->input->post('current_loc'),
				"email_id" 			=>	$this->input->post('email'),
				"password" 			=>	password_hash($this->input->post('password'), PASSWORD_BCRYPT)	
			);
			$save = $this->security->xss_clean($save);
			$this->Employer_model->save_employer($save);
			redirect('Employer/login');
			exit;
		}
	}

	/* 
	To view the login page when other links are clicked from other page 
	*/
	public function login(){
		$this->load->view('Employer/login');
	}

	/* 
	These function are used to login the form of the employer through validating by calling validate_Login() function 
	*/
	public function check_login(){
		$this->form_validation->set_rules('logIn', '', 'callback_isvalidate_login');
		if($this->form_validation->run() == FALSE){
			if(isset($this->session->userdata['logged_in1'])){
				$this->load->view('employer/dashboard');
			}else{
				$this->load->view('employer/login');
			}
		}
		else{
			redirect('Employer/dashboard');
			exit;
		}
	}

	/* 
	These are the function that are used to verify the credential of the user information 
	*/
	public function isvalidate_login(){
		$email 		= $this->input->post('Email');
		$password 	= $this->input->post('password');
		if($this->Employer_model->isvalidate_user($email, $password)){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('isvalidate_login', 'Incorrect Email Id or Password');
			return FALSE;
		}
	}

	/* 
	To view the Employer DashBoard page when other links are clicked from other page 
	*/
	public function dashboard(){
		$this->load->view('Employer/dashboard');
	}

	/* 
	To view the PostJob page when other links are clicked from other page 
	*/
	public function post_job(){
		$this->load->view('Employer/postjob');
	}

	/* 
	To save the save posted by the employer 
	*/
	public function save_job_post(){
		$this->form_validation->set_rules('job_type', 'Job Type', 'required');
		$this->form_validation->set_rules('job_location', 'Job Location', 'required');
		$this->form_validation->set_rules('experience', 'Experience', 'required');
		$this->form_validation->set_rules('budget', 'Budget', 'required|numeric');
		$this->form_validation->set_rules('desc', 'Description', 'min_length[100]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('Employer/postjob');
		}
		else{
			$save = array(
				"jobtitle" 		=> $this->input->post('job_title'),
				"description" 	=> $this->input->post('desc'),
				"budget" 		=> $this->input->post('budget'),
				"jobtype" 		=> $this->input->post('job_type'),
				"joblocation" 	=> $this->input->post('job_location'),
				"employer_id" 	=> $this->session->userdata['logged_in1']['id'],
				"experience" 	=> $this->input->post('experience')
			);
			$save = $this->security->xss_clean($save);
			$this->Employer_model->save_job_post($save);
			redirect("Employer/mypost");
			exit;	
		}
	}

	/* 
	To view the MyJob page when other links are clicked from other page 
	*/
	public function mypost(){
		$id 				= $this->session->userdata['logged_in1']['id'];
		$data['postList'] 	= $this->Employer_model->show_post_by_id($id);
		$data['numbers'] 	= $this->Employer_model->count_number_of_application($id);
		$this->load->view('Employer/myJobs', $data);
	}

	/* 
	These function are used to delete the record of the used by its id 
	*/
	public function deleterecord($id){
		$id = base64_decode($id);
		$this->Employer_model->delete_record_by_id($id);
		redirect('Employer/mypost');
		exit;
	}

	/*
	1. To get the record of particular job id 
	2. Update the record
	*/
	public function edit_data($id){
		$id = base64_decode($id);
		$data["singlePostList"] = $this->Employer_model->fetch_single_post_by_id($id);
		$this->load->view('employer/postjob', $data);
	}

	/* 
	To update the record of the job post Page 
	*/
	public function update_record(){
		$this->form_validation->set_rules('job_type', 'Job Type', 'required');
		$this->form_validation->set_rules('job_location', 'Job Location', 'required');
		$this->form_validation->set_rules('experience', 'Experience', 'required');
		$this->form_validation->set_rules('budget', 'Budget', 'required|numeric');
		if($this->form_validation->run() == FALSE){
			$id = $this->input->post('e_jobtitle');
			$this->edit_data($id);
		}
		else{
			$jobtitle 		= $this->input->post('job_title');
			$budget 		= $this->input->post('budget');
			$desc 			= $this->input->post('desc');
			$jobtype 		= $this->input->post('job_type');
			$joblocation 	= $this->input->post('job_location');
			$id 			= base64_decode($this->input->post('e_jobtitle'));
			$experience 	= $this->input->post('experience');
			$data 			= array(
								'jobtitle'		=>	$jobtitle,
								'description' 	=>	$desc ,
								'budget' 		=> 	$budget,
								'jobtype' 		=> 	$jobtype, 
								'joblocation' 	=> 	$joblocation,
								'experience' 	=> 	$experience
							);
			$data 			= $this->security->xss_clean($data);		 
			if($this->Employer_model->isupdate_record_by_id($data, $id)){
				redirect("Employer/mypost");
				exit;
			}
		}
	}

	/* 
	This will show you the list of Applicants for particular Job Title 
	*/
	public function show_list_of_applicant(){
		$id 			= base64_decode($this->input->get('id'));
		$data['list'] 	= $this->Employer_model->show_list_of_applicant($id);
		$data['title']	= $this->Employer_model->fetch_single_post_by_id($id);
		$this->load->view('Employer/showListOfApplicant', $data);
	}	

	public function downloadresume(){
		$id 		= base64_decode($this->input->get('id'));
		$fileName 	= $this->Employer_model->download_resume_by_id($id);
		$url 		= base_url().'documents/'.$fileName[0]->resume;
		header("Content-disposition:attachment;
			filename = $url");
		header("Content-type:application/pdf");
		readfile("$url");
	}

	public function logout(){
		$id = $this->session->userdata['logged_in1']['id'];
    	if($this->Employer_model->islogout_user($id)){
    		redirect('Employer/login');
    		exit;
    	}
    	else{
    		return $this->db->error();
    	}
	}
}
?>