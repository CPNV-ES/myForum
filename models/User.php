<?php

use Expreql\Expreql\Model;

class User extends Model
{
    public static $table = 'users';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'pseudo',
    ];
}
