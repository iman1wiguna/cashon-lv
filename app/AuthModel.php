<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    protected $table = "users";

    protected $primary_key = "id";
    public $timestamps = false;
    	
}
