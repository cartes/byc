<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const PERSON = 2;
    const BUSINESS = 3;
}
