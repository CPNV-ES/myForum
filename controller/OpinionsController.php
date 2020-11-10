<?php

include "model/Opinions.php";

class OpinionsController
{
    public function index()
    {
        $opinions = Opinions::all();
        require_once "./view/opinions/index.view.php";
    }
}