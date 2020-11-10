<?php

require_once "model/Opinion.php";

class OpinionController
{
    public function index()
    {
        $opinions = Opinion::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }
}