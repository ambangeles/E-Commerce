<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class Product extends CI_Model {
    /* get all the categories */
    public function get_categories() {
        return $this->db->query("SELECT * FROM categories")->result_array(); 
    }

    /* get the products by category */
    public function get_products_by_category($category_id, $page_first_result, $results_per_page) {
        $query = "SELECT * FROM products WHERE category_id = ?  LIMIT ?, ?";
        $values = array(
            $this->security->xss_clean($category_id),
            intval($this->security->xss_clean($page_first_result)),
            intval($this->security->xss_clean($results_per_page))
        );
        return $this->db->query($query, $values)->result_array();
    }

    /* get the total products per categories */
    public function get_products_count($category_id = "") {
        /* triggered when show all category is selected */
        if($category_id === "") {
            $query = "SELECT COUNT(*) as count FROM products";
        } else {
            $query = "SELECT COUNT(*) as count FROM products where category_id = ?";
        }
        $values =  array($this->security->xss_clean($category_id));

        return $this->db->query($query, $values)->row_array(); 
    }

     /* get all the categories */
     public function get_products($page_first_result, $results_per_page) {
        $query = "SELECT * FROM products LIMIT ?, ?";
        $values = array(
            intval($this->security->xss_clean($page_first_result)),
            intval($this->security->xss_clean($results_per_page))
        );
        return $this->db->query($query, $values)->result_array(); 
    }

    // /* check database if there is exsisting users. */
    // public function check_users() {
    //     return $this->db->query("SELECT * FROM users")->result_array();
    // }

    // /* get specific user information. */
    // public function get_user_info($id) {
    //     return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    // }

    // /*
    // Triggered by register process.
    // Validate user input from the register form.
    // */
    // public function validate_login() {
    //     $this->form_validation->set_rules("email", "email address", "trim|required|valid_email");
    //     $this->form_validation->set_rules("password", "password", "trim|required");

    //     if($this->form_validation->run() === FALSE) {
    //         return validation_errors();
    //     } else {
    //         return "valid";
    //     }
    // }

    // /*
    // Triggered when input from login is valid.
    // Check user login credentials if there is match in the database.
    // If match login the user.
    // */
    // public function login_user($user) {
    //     $query = "SELECT id, user_level, password, salt FROM users WHERE email = ?";
    //     $values = array($this->security->xss_clean($user["email"]));
    //     $db_user = $this->db->query($query, $values)->row_array();

    //     if ($db_user["password"] == md5($this->security->xss_clean($user["password"]) . "" . $db_user["salt"])) {
    //         return array("id" => $db_user["id"], "user_level" => $db_user["user_level"]);
    //     } else {
    //         return "invalid";
    //     }
    // }
        
    // /*
    // Validate user input from the register form.
    // */
    // public function validate_register() {
    //     $this->form_validation->set_rules("email", "email address", "trim|required|valid_email|is_unique[users.email]");
    //     $this->form_validation->set_rules("first_name", "first name", "trim|required|alpha_numeric_spaces");
    //     $this->form_validation->set_rules("last_name", "first name", "trim|required|alpha_numeric_spaces");
    //     $this->form_validation->set_rules("password", "password", "trim|required|min_length[8]");
    //     $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[password]');

    //     if($this->form_validation->run() === FALSE) {
    //         return validation_errors();
    //     } else {
    //         return "valid";
    //     }
    // }

    // /*
    // Register user in the database. 
    // If it is the first register set the user to admin.
    // */
    // public function register_user($user) {
    //     $salt = bin2hex(openssl_random_pseudo_bytes(22));
    //     $encrypted_password = md5($this->security->xss_clean($this->input->post("password")) . "" . $salt);
    //     $users = $this->check_users();

    //     if(count($users) > 0) {
    //         $level = 1;
    //     } else {
    //         $level = 9;
    //     }

    //     $query = "INSERT INTO users (user_level, first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?,?,?,?,?,?,NOW(),NOW())";
    //     $values = array(
    //         $level,
    //         $this->security->xss_clean($user["first_name"]),
    //         $this->security->xss_clean($user["last_name"]),
    //         $this->security->xss_clean($user["email"]),
    //         $encrypted_password,
    //         $salt
    //     );
    //     $this->db->query($query, $values);
    //     return array("id" => $this->db->insert_id(), "user_level" => $level);
    // }
}
?>