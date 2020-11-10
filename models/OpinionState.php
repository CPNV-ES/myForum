<?php

use Expreql\Expreql\Model;

require_once 'models/Opinion.php';

class OpinionState extends Model
{
    public static $table = 'opinionstates';

    public static $primary_key = 'id';

    public static $fields = [
        'id',
        'name',
    ];

    public static $has_many = [
        Opinion::class => 'opinionstate_id',
    ];
}
