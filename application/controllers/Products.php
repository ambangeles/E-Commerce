<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Products extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model("Product");
    }

	/* display category page */
	public function category() {
		$data["categories"] = $this->Product->get_categories();
		$this->load->view("category", $data);
	}

	/* display the products on the page */
	public function get_products() {
		if($this->input->get("name") === NULL) {
			$name = "";
		} else {
			$name = $this->input->get("name");
		}

		if($this->input->get("order") === NULL) {
			$order = "name ASC";
		} else {
			$order = $this->input->get("order");
		}

		if($this->input->get("page") === NULL) {
			$page = 1;
		} else {
			$page = $this->input->get("page");
		}

		$categories = $this->Product->get_categories();
		if($this->input->get("id") === NULL || $this->input->get("id") === "all") {
			$type = "All";
			$id = "all";
		} else {
			$type = $categories[array_search($this->input->get("id"), array_column($categories, 'id'))]["type"];
			$id = $this->input->get("id");
		}

		$results_per_page = 15;  
        $page_first_result = ($page-1) * $results_per_page;
		$data["number_of_page"] = ceil($this->Product->get_products_count(
			$this->input->get()
			)["count"] / $results_per_page);
		$data["products"] = $this->Product->get_products(
			$this->input->get(), 
			$page_first_result, 
			$results_per_page
		);

		if($page <= 0) {
			$page = 1;
		} elseif($page >= $data["number_of_page"]) {
			$page = $data["number_of_page"];
		}
		
		$data["id"] = $id;
		$data["page"] = $page;
		
		$res = array(
			"categorized_products" => $this->load->view("partials/products", $data, TRUE),
			"pagination" => $this->load->view("partials/pagination", $data, TRUE),
			"pagination_nav" => $this->load->view("partials/pagination_nav", $data, TRUE),
			"page_no" => $page,
			"type" => $type,
			"id" => $id,
			"name" => $name,
			"order" => $order
		);
		
		echo json_encode($res);
	}


	// /* display the catalog page */
	// public function category($category_id = "", $page = "1") {
	// 	if($category_id === "") {
	// 		redirect("products/category/all/1");
	// 	} 

	// 	$results_per_page = 5;  
    //     $page_first_result = ($page-1) * $results_per_page;
	// 	$data["categories"] = $this->Product->get_categories();

	// 	if ($category_id === "all") {
	// 		$data["number_of_page"] = ceil($this->Product->get_products_count()["count"] / $results_per_page); 

	// 		if($page <= 0) {
	// 			$page = 1;
	// 		} elseif($page >= $data["number_of_page"]) {
	// 			$page = $data["number_of_page"];
	// 		}

	// 		$data["products"] = $this->Product->get_products($page_first_result, $results_per_page);
	// 	} else {
	// 		$data["number_of_page"] = ceil($this->Product->get_products_count($category_id)["count"] / $results_per_page);  

	// 		if($page <= 0) {
	// 			$page = 1;
	// 		} elseif($page >= $data["number_of_page"]) {
	// 			$page = $data["number_of_page"];
	// 		}

	// 		$data["products"] = $this->Product->get_products_by_category($category_id, $page_first_result, $results_per_page);
	// 	}

	// 	$data["page"] = $page;
	// 	$data["category_id"] = $category_id;
	// 	if($category_id == "all") {
	// 		$data["category_type"] = "all";
	// 	} else {
	// 		$data["category_type"] = $data["categories"][array_search($category_id, array_column($data["categories"], 'id'))]["type"];
	// 	}
	// 	$this->load->view("category", $data);
	// }

	// /*
    // Validate the input from search form. If no error, search from the database.
    // */
    // public function process_search($category_id = "", $page = "1") {
	// 	$name = $this->input->post("name");
	// 	if(!$name) {
	// 		$name = "";
	// 	}
		
 	// 	$results_per_page = 5;  
    //     $page_first_result = ($page-1) * $results_per_page;
	// 	$data["categories"] = $this->Product->get_categories();

	// 	// $data["number_of_page"] = ceil($this->Product->get_products_count_search("%".$name."%", $category_id)["count"] / $results_per_page);  

	// 	// if($page <= 0) {
	// 	// 	$page = 1;
	// 	// } elseif($page >= $data["number_of_page"]) {
	// 	// 	$page = $data["number_of_page"];
	// 	// }

	// 	$data["products"] = $this->Product->search("%".$name."%", $category_id, $page_first_result, $results_per_page);
	// 	$data["number_of_page"] = ceil(count($data["products"])/ $results_per_page);  
	// 	if($page <= 0) {
	// 		$page = 1;
	// 	} elseif($page >= $data["number_of_page"]) {
	// 		$page = $data["number_of_page"];
	// 	}
	// 	$data["page"] = $page;
	// 	$data["category_id"] = $category_id;
	// 	if($category_id == "all") {
	// 		$data["category_type"] = "all";
	// 	} else {
	// 		$data["category_type"] = $data["categories"][array_search($category_id, array_column($data["categories"], 'id'))]["type"];
	// 	}
	// 	$this->load->view("category", $data);
	// 	// $data["products"] = $this->Product->search("%".$name."%", $this->input->post("category_id"));
	// 	// $this->load->view('partials/catalog-partial', $data);
    // }

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
