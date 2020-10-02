<?php

use Expreql\Expreql\Model;

class Theme extends Model
{
    public static $table = 'themes';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'name',
    ];
}
