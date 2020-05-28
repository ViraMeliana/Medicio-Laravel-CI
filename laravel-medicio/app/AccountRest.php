<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountRest extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = [
    						'username',
    						'password',
    						'email',
    						'role',
    						'FULL_NAME',
    						'ADDRESS',
    						'PHONE_NUMBER'
    						];
}
