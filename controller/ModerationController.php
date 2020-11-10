<?php

require_once("model/Moderation.php");
require_once("model/State.php");

class ModerationController
{
    public function index()
    {
        $opinions = Moderation::all();
        $states = State::all();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/moderation/index.view.php";
    }
}
