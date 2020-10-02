<?php

use Expreql\Expreql\Model;

class State extends Model
{
    public static $table = 'states';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'name',
    ];
}
