<?php

require_once("Db.php");

class Moderation
{
    public $id;
    public $pseudo;
    public $opinion;
    public $state;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the References stored in the database
     */
    public static function all()
    {
        return Db::selectMany("select * from opinions as op inner join users as us on us.id = op.user_id inner join states as st on st.id = op.opinionstate_id", [], "Moderation");
    }
}
