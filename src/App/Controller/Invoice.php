<?php

namespace App\Controller;

class Invoice
{
    public function index():string
    {
        return 'Invoices';
    }

    public function create():string
    {
        return '';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}