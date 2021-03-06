<?php
    class Order{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getOrders(){
            $this->db->query('SELECT *,
                              completed_orders.id as orderId,
                              completed_orders.ordered_at as orderTime,
                              users.id as userId
                              FROM completed_orders
                              INNER JOIN users
                              ON completed_orders.user_id = users.id
                              ORDER BY completed_orders.id DESC
                              ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getTotalPrice($id){
            $this->db->query('SELECT 
            order_details.id as orderDetailsId,
            SUM(order_details.product_price  * order_details.quantity) as totalPaid
            FROM order_details WHERE completed_orders_id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();

            return $results;
        }

        public function getOrderDetailsById($id){
           
            $this->db->query('SELECT
                            order_details.product_id as productId,
                            products.name as productName,
                            order_details.product_price as productPrice,
                            order_details.quantity as productQuantity
                            FROM order_details
                            INNER JOIN products
                            ON  order_details.product_id = products.id
                            WHERE completed_orders_id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getOrdersByUsersId($id){
            $this->db->query('SELECT *,
                              completed_orders.id as orderId,
                              completed_orders.ordered_at as orderTime,
                              users.id as userId
                              FROM completed_orders
                              INNER JOIN users
                              ON completed_orders.user_id = users.id
                              WHERE users.id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }

                public function getOrderDetailsByUserId($id){
           
            $this->db->query('SELECT
                            order_details.product_id as productId,
                            products.name as productName,
                            order_details.product_price as productPrice,
                            order_details.quantity as productQuantity,
                            completed_orders.id as orderUserId,
                            completed_orders.user_id as userOrderId,
                            users.id as userId
                            FROM order_details
                            INNER JOIN products
                            ON  order_details.product_id = products.id
                            INNER JOIN completed_orders
                            ON  order_details.completed_orders_id = completed_orders.id
                            INNER JOIN users
                            ON completed_orders.user_id = users.id
                            WHERE completed_orders.user_id = :id');
            $this->db->bind(':id', $id);

            $results = $this->db->resultSet();

            return $results;
        }
        
        
        // Complete Order 
        public function newOrder($id){

             $this->db->query('INSERT INTO completed_orders (user_id) VALUES(:user_id)');
        
            // Bind values
            $this->db->bind(':user_id', $id);

            // Exectute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function newOrderDetails($data){

        
            $this->db->query('INSERT INTO order_details ( product_id, product_price, quantity, completed_orders_id ) VALUES(:product_id, :product_price, :quantity, :completed_orders_id)');
            // Bind values
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':product_price', $data['product_price']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':completed_orders_id', $data['completed_orders_id']);

            // Exectute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function getMaxUserId($id){
            $this->db->query('SELECT MAX(id) as MaxID FROM completed_orders WHERE user_id = :id');
            
            $this->db->bind(':id', $id);

            $results = $this->db->single();

            return $results;
        }
    }