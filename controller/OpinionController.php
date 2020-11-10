<?php

require_once("model/Opinion.php");

class OpinionController {
    public function moderate() {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/opinions/moderate.view.php";
    }
}