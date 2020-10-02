<?php

use Expreql\Expreql\Model;

class Reference extends Model
{
    public static $table = 'references';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'description',
        'url',
    ];
}
