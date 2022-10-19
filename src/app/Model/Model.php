<?php

namespace App\Model;

use App\App;
use App\DB;


abstract class Model
{
    /** @var \PDO $db */
    protected DB $db;

    public function __construct()
    {
        $this->db = App::db();
    }

}