<?php 

include "model/Opinion.php";
include "model/User.php";
include "model/State.php";

class ModerationController
{
    public function index()
    {
        $opinions = Opinion::all();
        $stateType = State::all();
        foreach($opinions as $Key => $Value)
        {
            $Value->username = User::getUsernameById($Value->user_id);
            $Value->state_name = State::getStateById($Value->opinionstate_id);
        }
        require_once "./view/moderation/index.view.php";       
    }
    public function cycle()
    {
        require_once "./view/moderation/cycle.view.php";
    }
}



?>