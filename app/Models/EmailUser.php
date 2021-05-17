<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailUser extends Model
{
    protected $fillable = ['email', 'opt_in', 'first_name', 'last_name'];
}
