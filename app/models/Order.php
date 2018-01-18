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
    }