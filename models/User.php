<?php

use Expreql\Expreql\Model;

require_once 'models/Opinion.php';

class User extends Model
{
    public static $table = 'users';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'pseudo',
    ];

    public static $has_many = [
        Opinion::class => 'user_id'
    ];
}
