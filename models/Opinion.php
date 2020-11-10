<?php

use Expreql\Expreql\Model;

class Opinion extends Model
{
    public static $table = 'opinions';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'description',
        'user_id',
        'opinionstate_id'
    ];
}
