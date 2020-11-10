<?php

use Expreql\Expreql\Model;

class OpinionState extends Model
{
    public static $table = 'opinionstates';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'name',
    ];
}
