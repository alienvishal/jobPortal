<?php
class Home extends CI_Controller {

	/*
	Used for calling login page
	*/
	public function login(){
		$this->load->view('home_login');
	}

	/* 
	Used for calling Registration Page
	*/
	public function register(){
		$this->load->view('home_register');
	}
}
?>