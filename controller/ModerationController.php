<?php

require_once "model/Moderation.php";

class ModerationController
{
    public function index()
    {
        $moderations = Moderation::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/moderations/index.view.php";
    }
}