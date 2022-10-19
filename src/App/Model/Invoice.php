<?php

namespace App\Model;

class Invoice extends Model
{
    public function create(int $amount ,int $user_id): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO invoices (amount, user_id)
                      VALUES (?, ?)'
        );

        $stmt->execute([$amount, $user_id]);
        return (int) $this->db->lastInsertId();
    }

    public function find(int $invoiceId): array
    {
        $stmt = $this->db->prepare('SELECT invoices.id, amount, full_name 
                                FROM invoices
                                LEFT JOIN users ON users.id = user_id
                                WHERE invoices.id = ?');
        $stmt->execute([$invoiceId]);
        $invoice = $stmt->fetch();
        return $invoice ?? [];
    }
}