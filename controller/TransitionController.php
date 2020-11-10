<?php

require_once "model/Transition.php";

class TransitionController
{
    public function index()
    {
        $transitions = Transition::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/transitions/index.view.php";
    }
}