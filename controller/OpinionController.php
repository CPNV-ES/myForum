<?php

require_once('model/Opinion.php');

class OpinionController{
    /**
     * This method load the opinions from the model and call the index page of opinions view
     */
    public function index ()
    {
        $Opinions = Opinion::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/index.view.php";
    }
}