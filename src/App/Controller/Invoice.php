<?php

namespace App\Controller;

use App\View;

class Invoice
{
    public function index(): View
    {
        return View::make('invoices/index');
    }

    public function create(): View
    {
        return View::make('invoices/create');
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}