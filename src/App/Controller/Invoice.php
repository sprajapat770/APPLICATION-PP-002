<?php

namespace App\Controller;

use App\View;

class Invoice
{
    public function index():string
    {
        return View::make('invoices/index')->render();
    }

    public function create():string
    {
        return View::make('invoices/create')->render();
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}