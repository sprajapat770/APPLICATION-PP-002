<?php

namespace App\Classes;

class Invoice
{
    public function index():string
    {
        unset($_SESSION['count']);
        return 'Invoices';
    }

    public function create():string
    {
        return '<form method="post" action="/invoices/create">
            <label>Amount</label>
            <input type="text" name="amount">
            </form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}