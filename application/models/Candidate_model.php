<?php
class Candidate_model extends CI_Model {

	public function save_information($data){
		$this->db->insert('candidate', $data);
		$cand_id = $this->db->insert_id();
		return $cand_id;
	}

	/* 
	Uses for login the candidate Page and creating a session for each candidate 
	*/
	public function is_verify_user($email, $password){
		$user_id = $this->db->query("
									SELECT 
										emailid, 
										password, 
										id, 
										firstname, 
										lastname
									FROM
										candidate
									WHERE 
										emailid = '$email' 
									");
		if($user_id->num_rows() > 0 ){
			$fetch_result = $user_id->row();
			if(password_verify($password, $fetch_result->password)){
				$login_data = [
					"user_id"	=> $fetch_result->id,
					"name" 		=> implode(" ", array($fetch_result->firstname, $fetch_result->lastname))
				];
				$this->session->set_userdata('logged_in', $login_data);
				return TRUE;	
			}
			else{
				return FALSE;	
			}
		}
	}

	/* 
	These Function are used for getting the search result for candidate on basis of job type and job location 
	*/
	public function get_result($jobtype, $joblocation){
		$query = $this->db->query("
								SELECT 
									employers.*,
									jobposting.*
								FROM 
									jobposting
								LEFT JOIN
									employers 
								ON
									employers.id = jobposting.employer_id
								WHERE
									jobtype = '$jobtype' AND 
									joblocation = '$joblocation'
								");
		$result = $query->result_array();
		return $result;
	}

	/* 
	The Function is used for displaying job posted by the employee by using the employer id 
	*/
	public function display_post_by_id($id){
		$query = $this->db->query("
								SELECT 
									employers.*, 
									jobposting.*
								FROM
									jobposting
								LEFT JOIN
									employers
								ON
									jobposting.employer_id = employers.id 
								WHERE
									jobposting.id = $id 
								");
		$result = $query->result_array();
		return $result;
	}

	/*
	These Function are used to Save the job applied by the seperate user by using its session id 
	*/
	public function save_appliedJob($data){
		$this->db->insert('appliedjobs', $data);
		$apply_id = $this->db->insert_id();
		return $apply_id;
	}

	/* 
	These function are used to show all the job applied by the respective user when he or she want to view his or her applied job section 
	*/
	public function show_appliedjob_by_id($id){
		$query = $this->db->query("
								SELECT * 
								FROM
									appliedjobs
								WHERE
									candidate_id = $id 
								");
		$result = $query->result_array();
		return $result;
	}

	/* 
	To extract candidate information by its id 
	*/
	public function display_info_by_id($id){
		$query = $this->db->query("
								SELECT *
								FROM
									candidate
								WHERE 
									id = $id 
								");
		$result = $query->result_array();
		return $result;
	}	

	/* 
	To Update the record of the candidate 
	*/
	public function isupdate_record_by_id($data,$id){
		$query = $this->db->query("
								UPDATE 
									candidate
								SET
									ctc = $data[ctc],
									firstname = '$data[firstname]',
									lastname = '$data[lastname]',
									gender = '$data[gender]',
									dob = '$data[dob]',
									contactnumber = $data[contactnumber],
									currentloc = '$data[currentloc]',
									emailid = '$data[emailid]',
									imgupload = '$data[imgupload]',
									resume = '$data[resume]',
									jobtitle = '$data[jobtitle]',
									experience = $data[experience]
								WHERE
									id = $id		
								");
    	return TRUE;
	}

	/*
	Function that are used for LogOut from the specfied account
	*/
	public function isLogout_user($id){
		$user_id = $this->db->query("
									SELECT *
									FROM
										candidate
									WHERE 
										id = $id
									");
		$fetch_result = $user_id->row();
		if($fetch_result){
			$data = [
				"user_id" => $fetch_result->id
			];
			$this->session->unset_userdata('logged_in', $data);
			return TRUE;	
		}
		else{
			return FALSE;	
		}
	}
}
?>