<?php

namespace App\Classes;

class Home
{
    public function index():string
    {
        echo '<pre>';
        var_dump($_GET);
        echo '</pre>';
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
        return '<form method="post" action="/?foo=bar">
            <label>Amount</label>
            <input type="text" name="amount">
            </form>';
    }
}