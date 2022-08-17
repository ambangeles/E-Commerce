<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model("Product");
    }

	/* display the catalog page */
	public function category($category_id = "", $page = "1") {
		if($category_id === "") {
			redirect("products/category/all/1");
		} 
		// if ($this->input->get() == NULL) {  
        //     $page = "1";  
        // } else {  
        //     $page = $this->input->get()["page"];  
        // }  
		$results_per_page = 5;  
        $page_first_result = ($page-1) * $results_per_page;
		$data["categories"] = $this->Product->get_categories();

		if ($category_id === "all") {
			$data["number_of_page"] = ceil($this->Product->get_products_count()["count"] / $results_per_page);  
			$data["products"] = $this->Product->get_products($page_first_result, $results_per_page);
		} else {
			$data["number_of_page"] = ceil($this->Product->get_products_count($category_id)["count"] / $results_per_page);  

			$data["products"] = $this->Product->get_products_by_category($category_id, $page_first_result, $results_per_page);
		}

		$this->load->view("catalog", $data);
	}

	// /* display the catalog page */
	// public function catalog() {
	// 	$data["products"] = $this->Product->get_products();
	// 	$data["categories"] = $this->Product->get_categories();
 	// 	$this->load->view("catalog", $data);
	// }

	// public function get_categories() {
	// 	$data["categories"] = $this->Product->get_categories();
	// 	$this->load->view("partials/category-list", $data);
	// }

	// /* display the catalog page */
	// public function category($category_id = "") {
	// 	$data["products"] = $this->Product->get_products_by_category($category_id);
	// 	$this->load->view("partials/catalog-partial", $data);
	// }

	// if($category_id === "") {
	// 	$data["products"] = $this->Product->get_products();
	// } else {
	// 	$data["products"] = $this->Product->get_products_by_category($category_id);
	// }
	// // var_dump($data["categories"]);
	// // var_dump($category_id);

	// /* display the catalog page */
	// public function catalog() {
	// 	$data["categories"] = $this->Product->get_categories();
 	// 	$this->load->view("catalog", $data);
	// }
	
	// /* display the search result based on the category  */
	// public function category_search($category_id) {
	// 	$data["products"] = $this->Product->get_products_by_category($category_id);
	// 	$this->load->view("partials/catalog-partial", $data);
	// }

	public function product_info() {
		$this->load->view("product_info");
	}

	public function cart() {
		$this->load->view("cart");
	}
}
