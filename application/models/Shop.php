<?php 
date_default_timezone_set("Asia/Manila");

class Shop extends CI_Model {
    public function get_all() {
        return $this->db->query("SELECT * FROM items")->result_array();
    }

    public function get_price() {
        return $this->db->query("SELECT id, price FROM items")->result_array();
    }

    public function add_customer($data) {
        $query = "INSERT INTO customers (name, address, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($data["name"], $data["address"],  date("Y-m-d, H:i:s"),  date("Y-m-d, H:i:s")); 
        $this->db->query($query, $values);
        return $this->db->insert_id();
    }

    public function add_orders($data, $id) {
        $query = "INSERT INTO orders (item_id, customer_id, quantity, created_at, updated_at) VALUES (?,?,?,?,?)";
        var_dump($data);
        $values = array($data["id"], strval($id), $data["quantity"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
        return $this->db->query($query, $values);
    }

    public function sum_quantity() {  
        return $this->db->query("SELECT SUM(quantity) as quantities FROM orders")->row_array();
    }

    public function delete($id) {
        $query = "DELETE FROM items WHERE id = ?";
        $values = array($id); 
        return $this->db->query($query, $values);
    }

    public function get_cart() {
        $query = "SELECT name, SUM(quantity) AS quantity, price FROM items INNER JOIN orders ON items.id = orders.item_id GROUP BY orders.item_id";
        return $this->db->query($query)->result_array();
    }
        /*
    Triggered by add and edit product method.
    Validate user input from the add and edit form.
    */
    public function validate_product() {
        $this->form_validation->set_rules("name", "name", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("description", "description", "trim|required");
        $this->form_validation->set_rules("price", "price", "trim|required|decimal");
        $this->form_validation->set_rules("inventory_count", "inventory count", "trim|required|is_natural");

        if($this->form_validation->run() === FALSE) {
            return validation_errors();
        } else {
            return "valid";
        }
    }
}
?>