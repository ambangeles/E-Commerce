<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {
	public function index() {
		$this->load->view("index");
	}

	public function product_info() {
		$this->load->view("product_info");
	}

	public function cart() {
		$this->load->view("cart");
	}
}
