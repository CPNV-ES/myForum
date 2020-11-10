<?php

include "model/Opinions.php";

class OpinionsController
{
    public function index()
    {
        $references = Reference::all();
        require_once "./view/opinions/index.view.php";
    }
}