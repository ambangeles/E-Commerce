<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Users extends CI_Controller {
	public function admin() {
		$this->load->view("authentication/admin");
	}

	public function login() {
		$this->load->view("authentication/login");
	}

    public function register() {
		$this->load->view("authentication/register");
	}
}
