<?php

require_once "model/Opinion.php";
require_once "model/OpinionState.php";

class OpinionController
{
    public function index()
    {
        $opinions = Opinion::all();
        $allstates = OpinionState::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }

}
