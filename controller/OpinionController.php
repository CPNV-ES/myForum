<?php

require_once("model/Opinion.php");
require_once("model/OpinionState.php");

class OpinionController {
    public function moderate() {
        $opinions = Opinion::all();
        $opinionStates = OpinionState::all();

        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/moderate.view.php";
    }
}