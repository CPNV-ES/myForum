<?php

require_once "model/Opinion.php";
require_once "model/OpinionStates.php";

class OpinionsController
{
    public function index()
    {
        $opinions = Opinion::all();
        $opinionStates = OpinionStates::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }
}