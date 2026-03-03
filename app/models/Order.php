<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Order extends Model
{
    public function create(array $orderData, array $items): int
    {
        $this->db->beginTransaction();
        $stmt = $this->db->prepare('INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, shipping_address, city, state, postal_code, subtotal, tax_amount, shipping_amount, discount_amount, total_amount, payment_method, payment_status, order_status, created_at, updated_at) VALUES (:user_id,:customer_name,:customer_email,:customer_phone,:shipping_address,:city,:state,:postal_code,:subtotal,:tax_amount,:shipping_amount,:discount_amount,:total_amount,:payment_method,:payment_status,:order_status,NOW(),NOW())');
        $stmt->execute($orderData);
        $orderId = (int) $this->db->lastInsertId();

        $itemStmt = $this->db->prepare('INSERT INTO order_items (order_id, product_id, product_name, unit_price, quantity, line_total, created_at) VALUES (:order_id,:product_id,:product_name,:unit_price,:quantity,:line_total,NOW())');
        foreach ($items as $item) {
            $itemStmt->execute([
                ':order_id' => $orderId,
                ':product_id' => $item['id'],
                ':product_name' => $item['name'],
                ':unit_price' => $item['price'],
                ':quantity' => $item['qty'],
                ':line_total' => $item['price'] * $item['qty'],
            ]);
        }

        $this->db->commit();
        return $orderId;
    }

    public function revenueToday(): float
    {
        $stmt = $this->db->query('SELECT COALESCE(SUM(total_amount),0) AS total FROM orders WHERE DATE(created_at) = CURDATE()');
        return (float) $stmt->fetch()['total'];
    }
}
