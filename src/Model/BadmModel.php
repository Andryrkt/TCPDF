<?php

namespace App\Model;

class BadmModel extends Model
{
    private $odbcCrud;

    public function __construct()
    {
        $this->odbcCrud = new OdbcCrudModel;
    }
}
