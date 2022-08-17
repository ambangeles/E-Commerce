<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Users extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model("User");
    }

	/* display login page */
	public function index() {
		if($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 1) {
            redirect(base_url(). "products/category");
        } elseif($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 9) {
            // redirect(base_url() . "dashboard/admin"); redirect to admin page
        } else {
			$this->load->view("authentication/login");
        }
	}

    /* display admin login page */
	public function admin() {
		$this->load->view("authentication/admin");
	}

	/* 
    Get the login form input and validate it. 
    If no error user will be login and 
    will redirected to the index. 
    */
    public function process_login() {
        $validation = $this->User->validate_login();

        if($validation === "valid") {
            $data = $this->User->login_user($this->input->post());

            if ($data === "invalid") {
                $this->session->set_flashdata("msg", "<p>Login failed.</p>");
                redirect(base_url());
            } else {
                $this->session->set_userdata("user_level", $data["user_level"]);
                $this->session->set_userdata("id", $data["id"]);
                $this->session->set_userdata("is_logged", TRUE);
                if($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 9) {
                    redirect(base_url() . "dashboard/admin");
                } elseif($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 1) {
                    redirect(base_url() . "products/category");
                }
            }
        } else {
            $this->session->set_flashdata("msg", $validation);
            redirect(base_url());
        }
    }

	/* display register page */
    public function register() {
		$this->load->view("authentication/register");
	}

    /* 
    Get the register form input and validate it. 
    If no error user will be automatically login and 
    will redirected to the index. 
    */
    public function process_register() {
        $validation = $this->User->validate_register();

        if($validation === "valid") {
            $data = $this->User->register_user($this->input->post());
            $this->session->set_userdata("user_level", $data["user_level"]);
            $this->session->set_userdata("id", $data["id"]);
            $this->session->set_userdata("is_logged", TRUE);
            if($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 9) {
                redirect(base_url() . "dashboard/admin");
            } elseif($this->session->userdata("is_logged") && $this->session->userdata("user_level") == 1) {
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata("msg", $validation);
            redirect(base_url() . "register");
        }
    }

	/* log out the user */
	public function logout() {
		$this->session->unset_userdata("user_level");
		$this->session->unset_userdata("id");
		$this->session->unset_userdata("is_logged");
		redirect(base_url() . "products/category");
	}
}
