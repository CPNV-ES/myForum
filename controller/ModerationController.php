<?php

require_once("model/Moderation.php");

class ModerationController
{
    public function index()
    {
        $opinions = Moderation::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/moderation/index.view.php";
    }
}
