<?php

use Expreql\Expreql\Model;

class Role extends Model
{
    public static $table = 'roles';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'name',
    ];
}
