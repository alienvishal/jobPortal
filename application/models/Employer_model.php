<?php
class Employer_model extends CI_Model{
	 /*
     To save Employee Data 
     */
	public function save_employer($data)
    { 
        $this->db->insert('employers', $data);
        $emp_id = $this->db->insert_id();
      	return $emp_id;
    }

    /* 
    Used for login the employer credentials 
    */
    public function isvalidate_user($email, $password) {
        $user = $this->db->query("
                                SELECT 
                                    email_id, 
                                    password, 
                                    id, 
                                    first_name, 
                                    last_name, 
                                    company_name
                                FROM 
                                    employers
                                WHERE
                                    email_id = '$email'
                                ");
        if($user->num_rows() > 0 ){
            $fetch_result = $user->row();
            if(password_verify($password, $fetch_result->password)){
                $login_data = [
                    'id'    => $fetch_result->id,
                    'name'  => implode(" ", array($fetch_result->first_name, $fetch_result->last_name)),
                    'company_name'  => $fetch_result->company_name
                ];
                $this->session->set_userdata('logged_in1', $login_data);
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }

    /* 
    To save post for job that applied by employee 
    */
    public function save_job_post($data){
        $this->db->insert('jobposting', $data);
        $post_id = $this->db->insert_id();
        return $post_id;
    }

    /* 
    To show all the job that are posted by the particular employer by it's id 
    */
    public function show_post_by_id($id){
        $query = $this->db->query("
                                SELECT * 
                                FROM
                                    jobposting
                                WHERE
                                    employer_id = $id 
                                ");
        $result = $query->result();
        return $result;
    }

    /* 
    To Delete Record By id 
    */
    public function delete_record_by_id($id){
        $query = $this->db->query("
                                DELETE 
                                FROM
                                    jobposting
                                WHERE 
                                    id = $id 
                                ");
    }

    /* 
    To fetch the single Record by id For Edit or Deleting Purpose Only
    */
    public function fetch_single_post_by_id($id){
        $query = $this->db->query("
                                SELECT *
                                FROM
                                    jobposting
                                WHERE
                                    id = $id 
                                ");
        $result = $query->result();
        return $result;
    }

    /* 
    To Update the record of the job posted by the employer by the respective job id 
    */
    public function isupdate_record_by_id($data, $id){
        $this->db->where('id', $id);
        $this->db->update('jobposting', $data);
        return TRUE;
    }

    /* 
    To calculate the count of the number of application applied to specfic job title
    */
    public function count_number_of_application($id){
        $query = $this->db->query("
                                SELECT 
                                    COUNT(appliedjobs.title)
                                FROM 
                                    jobposting
                                LEFT JOIN 
                                    appliedjobs
                                ON 
                                    jobposting.id = appliedjobs.job_id
                                WHERE 
                                    jobposting.employer_id = $id
                                GROUP BY 
                                    jobposting.id
                                ORDER BY 
                                    jobposting.id ASC
                                ");
        $result = $query->result_array();
        return $result;
    }

    public function show_list_of_applicant($id){
        $query = $this->db->query("
                                SELECT 
                                    candidate.*
                                FROM 
                                    candidate
                                LEFT JOIN 
                                    appliedjobs
                                ON 
                                    candidate.id = appliedjobs.candidate_id
                                WHERE 
                                    appliedjobs.job_id = $id
                                ");
        $result = $query->result();
        return $result;
    }

    public function download_resume_by_id($id){
        $query = $this->db->query("
                                SELECT 
                                    resume
                                FROM 
                                    candidate
                                WHERE 
                                    id = $id
                                ");
        $result = $query->result();
        return $result;
    }
    /*
    The function are used to logged out data 
    */
    public function islogout_user($id){
        $user_id = $this->db->query("
                                    SELECT *
                                    FROM
                                        employers
                                    WHERE 
                                        id = $id
                                    ");
        $fetch_result = $user_id->row();
        if($fetch_result){
            $login_data = [
                "id"   => $fetch_result->id
            ];
            $this->session->unset_userdata('logged_in1', $login_data);
            return TRUE;    
        }
        else{
            return FALSE;   
        }
    }
}
?>