<?php
class Candidate extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Candidate_model');
	}

	public function register(){
		$this->load->view('Candidate/register');
	}

	/* 
	To save the candidate information
	*/
	public function save_information(){
		$this->form_validation->set_rules('ctc', 'ctc', 'required|numeric');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|exact_length[10]|regex_match[/^[0-9]{3}[0-9]{3}[0-9]{4}$/]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('exp', 'Experience', 'required');
		$this->form_validation->set_rules('imgfile', '', 'callback_upload_image_file');
		$this->form_validation->set_rules('cv', '', 'callback_upload_cv');
		$this->form_validation->set_rules('email','Email', 'is_unique[candidate.emailid]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('Candidate/register');
		}
		else{
			/*
			Storing the information to candidate database
			*/
         	$save = array(
				"ctc"			=>	$this->input->post('ctc'),
				"firstname" 	=>	$this->input->post('first'),
				"lastname" 		=>	$this->input->post('last'),
				"gender" 		=>	$this->input->post('gender'),
				"dob" 			=>	$this->input->post('datepicker'),
				"contactnumber" =>	$this->input->post('contact_number'),
				"currentloc" 	=>	$this->input->post('current_loc'),
				"emailid" 		=> 	$this->input->post('email'),
				"password" 		=>	password_hash($this->input->post('password'), PASSWORD_BCRYPT),							
				"imgupload" 	=> 	$this->upload_image_file(),
				"resume" 		=> 	$this->upload_cv(),
				"jobtitle" 		=> 	$this->input->post('job'),
				"experience" 	=>	$this->input->post('exp')
			);
			$save = $this->security->xss_clean($save);
			$this->Candidate_model->save_information($save);
			redirect('Candidate/login');
			exit;
		}
	}

	/* 
	To call the function for uploading Image File 
	*/
	public function upload_image_file(){
		$config['upload_path']   = FCPATH.'uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';  
		$this->load->library('upload'); 
		$this->upload->initialize($config);
		$this->upload->do_upload('imgfile');
		/* 
		Whether file is uploaded or not
		*/
		if (!$this->upload->do_upload('imgfile')) {
			$this->form_validation->set_message('upload_image_file', 'Provide the image only in format gif,jpg,png,jpeg');
			return FALSE;
		}
		else{
			$save = $this->upload->data()["file_name"];
			return $save;
		}
	}

	/* 
	To call the function for uploading cv 
	*/
	public function upload_cv(){
    	$config['upload_path']   = FCPATH.'documents';
		$config['allowed_types'] = 'docx|pdf';  
		$this->load->library('upload'); 
		$this->upload->initialize($config);
		$this->upload->do_upload('cv');
		if (!$this->upload->do_upload('cv')) {
			$error = array('error' => $this->upload->display_errors()); 
			$this->form_validation->set_message('uploadCv', 'Provide your CV in pdf or docx');
			return FALSE;
		}
		else{
         	$save = $this->upload->data()["file_name"];
			return $save;
		}
    }

    /* 
    The function is call when user click on links
    */
    public function login(){
    	$this->load->view('Candidate/login');
    }

    /* 
    These function are executed when user hit the submit button for login purpose 
    */
    public function check_login(){
    	$this->form_validation->set_rules('logIn', '', 'callback_isvalidate_candidate_credentials');
    	if($this->form_validation->run() == FALSE){
    		if(isset($this->session->userdata['logged_in'])){
				$this->load->view('candidate/dashboard');
			}else{
				$this->load->view('Candidate/login');
			}
    	}
    	else{
    		redirect('candidate/dashboard');
    		exit;
    	}
    }

    /* 
    These function are used to validate user based on his credential and call by validate() function through callback 
    */
    public function isvalidate_candidate_credentials(){
    	$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		if($this->Candidate_model->is_verify_user($email, $password)){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('isvalidate_candidate_credentials', 'Incorrect Email or Password');
			return FALSE;
		}
    }

    /* 
    The function is call when user click on links
    */
    public function dashboard(){
    	$this->load->view('Candidate/Dashboard');
    }

    /* 
    The function is call when user click on links
    */
    public function search(){
    	$this->load->view('Candidate/Search');
    }

    /*
    Used to Search the result from database and show the input to the user.
    */
    public function execute_search(){
    	$jobtype 		= $this->input->post('job_type');
		$joblocation 	= $this->input->post('job_location');
		$data['result'] = $this->Candidate_model->get_result($jobtype, $joblocation);
		$this->load->view('Candidate/Search', $data);
    }
    
    /*
    To save the job applied by the indiviusal candidate
    */
    public function save_applied_jobs(){
    	date_default_timezone_set('Asia/Kolkata');
		$now 		= date('Y-m-d H:i:s');
		$session_id = $this->session->user_id;
		$save 		= array(
						"job_id" 			=>	$this->input->post('jobid'),
						"title" 			=>	$this->input->post('jobtitle'),
						"company_name" 		=> 	$this->input->post('companyname'),
						"candidate_id" 		=> 	$this->session->userdata['logged_in']['user_id'],
						"current_location" 	=> 	$this->input->post('currentloc'),
						"minexperience" 	=> 	$this->input->post('experience'),
						"AppliedOn" 		=> 	$now
					);
		$save = $this->security->xss_clean($save);
		$this->Candidate_model->save_appliedJob($save);
		redirect('candidate/applied_jobs');
    }
    
    /*
    The function is call when user click on links
    */
    public function applied_jobs(){
    	$session_id 		= $this->session->userdata['logged_in']['user_id'];
		$data['jobList'] 	= $this->Candidate_model->show_appliedjob_by_id($session_id);
    	$this->load->view('Candidate/AppliedJobs', $data);
    }
    
    /* 
    This function are used to display the job details by the job id
    */
    public function displayrecord(){
    	$id 			= base64_decode($this->input->get('id'));
    	$data['record'] = $this->Candidate_model->display_post_by_id($id);
		$this->load->view('candidate/DisplayJobs', $data);
    }
    
    /* 
    The function is call when user click on links 
    */
    public function profiler(){
    	$id 					= $this->session->userdata['logged_in']['user_id'];
		$data['displayInfo'] 	= $this->Candidate_model->display_info_by_id($id);
    	$this->load->view('Candidate/Profiler', $data);
    }
    
    /* 
    To edit the information of the candidate which is call by the profiler page 
    */
    public function edit_information(){
    	$id 					= $this->session->userdata['logged_in']['user_id'];
    	$data["singleUser"] 	= $this->Candidate_model->display_info_by_id($id);
		$this->load->view('candidate/Update', $data);
    }
    
    /* 
    To Update the information of the candidate which is call by the profiler page 
    */
    public function update_information(){
    	$id =$this->session->userdata['logged_in']['user_id'];
    	$this->form_validation->set_rules('ctc', 'ctc', 'required|numeric');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact Number', 'required|exact_length[10]|regex_match[/^[0-9]{3}[0-9]{3}[0-9]{4}$/]');
		$this->form_validation->set_rules('imgfile', '', 'callback_upload_image_file');
		$this->form_validation->set_rules('cv', '', 'callback_upload_cv');
		$orginal_email = $this->Candidate_model->display_info_by_id($id);
		if($orginal_email[0]['emailid'] != $this->input->post('email'))
			$this->form_validation->set_rules('email', 'Email', 'is_unique[candidate.emailid]');
		if($this->form_validation->run() == FALSE){
			$this->edit_information();
		}
		else { 
			$id 	= $this->session->userdata['logged_in']['user_id'];
         	$save 	= array(
				"ctc" 				=> 	$this->input->post('ctc'),
				"firstname" 		=>	$this->input->post('first'),
				"lastname" 			=>	$this->input->post('last'),
				"gender" 			=>	$this->input->post('gender'),
				"dob" 				=>	$this->input->post('datepicker'),
				"contactnumber" 	=>	$this->input->post('contact_number'),
				"currentloc" 		=>	$this->input->post('current_loc'),
				"emailid" 			=> 	$this->input->post('email'),
				"password" 			=>	$this->input->post('password'),
				"imgupload" 		=> 	$this->upload_image_file(),
				"resume" 			=> 	$this->upload_cv(),
				"jobtitle" 			=> 	$this->input->post('job'),
				"experience" 		=>	$this->input->post('exp')
			);
			$save = $this->security->xss_clean($save);
			if($this->Candidate_model->isupdate_record_by_id($save, $id)){
				redirect('candidate/Profiler');
				exit;
			}
		} 
    }

    public function logout(){
    	$id = $this->session->userdata['logged_in']['user_id'];
    	if($this->Candidate_model->isLogout_user($id)){
    		redirect('Candidate/login');
    		exit;
    	}
    	else{
    		return $this->db->error();
    	}
    }
}
?>