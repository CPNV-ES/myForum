<?php

require_once('model/Opinion.php');
require_once('model/State.php');

class OpinionController{
    /**
     * This method load the opinions from the model and call the index page of opinions view
     */
    public function index ()
    {
        $opinions = Opinion::all();
        $states = State::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }
}