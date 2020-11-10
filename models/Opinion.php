<?php

use Expreql\Expreql\Model;

require_once 'models/User.php';
require_once 'models/OpinionState.php';

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

    public static $has_one = [
        User::class => 'user_id',
        OpinionState::class => 'opinionstate_id',
    ];
}
