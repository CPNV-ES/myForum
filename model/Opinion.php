<?php
/**
 * Author : Quentin Aellen
 * Created at : 10 november 2020
 */

 require_once("Db.php");

 class Opinion {
    public $id;
    public $description;
    private $topicId;
    private $userId;
    private $opinionStateId;
 }