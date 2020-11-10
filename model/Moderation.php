<?php

require_once("Db.php");

class Moderation
{    
    public static function all()
    {
        return Db::selectMany("SELECT opinions.opinionstate_id AS 'opId', opinions.description,opinionstates.name, users.pseudo FROM opinions, opinionstates, users WHERE opinions.opinionstate_id = opinionstates.id AND opinions.user_id = users.id;", [], "Moderation");
    }
}